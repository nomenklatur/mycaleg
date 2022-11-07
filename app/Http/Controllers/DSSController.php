<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Dapil;
use App\Models\Caleg;
use App\Models\Party;
use App\Models\DataTraining;

class DSSController extends Controller
{
    public function index(){
        return view('rekomendasi/pilih_dapil', [
            'title' => 'Pilih Dapil',
        ]);
    }

    public function simple_additive_weighting(Dapil $dapil){
        $caleg = $dapil->caleg->load('party');
        $max_pendidikan = $caleg->max('pendidikan');
        $max_pengalaman = $caleg->max('pengalaman');
        $max_penghasilan = $caleg->max('penghasilan');
        $max_keanggotaan = $caleg->max('keanggotaan');
        $max_kekayaan = $caleg->max('kekayaan');
        $normalized = collect([]);

        foreach ($caleg as $item) {
            $normalized->push(collect([
                'nama' => $item->nama,
                'uri' => $item->uri,
                'gambar' => $item->gambar,
                'jenis_kelamin' => $item->jenis_kelamin,
                'partai' => $item->party->nama,
                'probability' => $this->naive_bayes_classifier($item),
                'preference' => (number_format(($item->pendidikan / $max_pendidikan), 2) * 40) + (number_format(($item->pengalaman / $max_pengalaman), 2) * 25) + (number_format(($item->penghasilan / $max_penghasilan),2) * 10) + (number_format(($item->keanggotaan / $max_keanggotaan),2) * 20) + (number_format(($item->kekayaan / $max_kekayaan),2) * 5)
            ]));
        }

        return $normalized->sortByDesc('preference')->values();
    }

    public function naive_bayes_classifier(Caleg $caleg){
        $dataTraining = DataTraining::all();
        $jumlah = count($dataTraining);
        $jumlah_ya =  count($dataTraining->where('terpilih', 'ya'));
        $jumlah_tidak = count($dataTraining->where('terpilih', 'tidak'));
        $p_partai_ya = count($dataTraining->where('terpilih', 'ya')->where('partai', $caleg->party_id ));
        $p_kelamin_ya = count($dataTraining->where('terpilih', 'ya')->where('jenis_kelamin', $caleg->jenis_kelamin));
        $p_kelamin_tidak = count($dataTraining->where('terpilih', 'tidak')->where('jenis_kelamin', $caleg->jenis_kelamin));
        $p_pendidikan_ya = count($dataTraining->where('terpilih', 'ya')->where('pendidikan', $caleg->pendidikan));
        $p_pendidikan_tidak = count($dataTraining->where('terpilih', 'tidak')->where('pendidikan', $caleg->pendidikan));
        $p_partai_tidak = count($dataTraining->where('terpilih', 'tidak')->where('partai', $caleg->party_id ));
        $p_dapil_ya = count($dataTraining->where('terpilih', 'ya')->where('iddapil', $caleg->dapil_id ));
        $p_dapil_tidak = count($dataTraining->where('terpilih', 'tidak')->where('iddapil', $caleg->dapil_id ));
        
        if($p_partai_ya == 0 || $p_dapil_ya == 0 || $p_kelamin_ya == 0 || $p_pendidikan_ya == 0 || $p_pendidikan_tidak == 0){
            $partai_values = count($dataTraining->unique('partai'));
            $dapil_values = count($dataTraining->unique('iddapil'));
            $p_terpilih = (($p_partai_ya + 1) / ($jumlah_ya + $partai_values)) * (($p_dapil_ya + 1) / ($jumlah_ya + $dapil_values)) * (($p_kelamin_ya + 1) / ($jumlah_ya + 2)) * (($p_pendidikan_ya + 1) / ($jumlah_ya + 5)) * ($jumlah_ya / $jumlah);
            $p_tidak_terpilih = (($p_partai_tidak + 1) / ($jumlah_tidak + $partai_values)) * (($p_dapil_tidak + 1) / ($jumlah_tidak + $dapil_values)) * (($p_kelamin_tidak + 1) / ($jumlah_tidak + 2)) * (($p_pendidikan_tidak + 1) / ($jumlah_tidak + 5)) * ($jumlah_tidak / $jumlah);
        }
        else{
            $p_terpilih = ($p_partai_ya / $jumlah_ya) * ($p_dapil_ya / $jumlah_ya) * ($p_kelamin_ya / $jumlah_ya) * ($p_pendidikan_ya / $jumlah_ya) * ($jumlah_ya / $jumlah);
            $p_tidak_terpilih = ($p_partai_tidak / $jumlah_tidak) * ($p_dapil_tidak / $jumlah_tidak) * ($p_kelamin_tidak / $jumlah_tidak) * ($p_pendidikan_tidak / $jumlah_tidak) * ($jumlah_tidak / $jumlah);
        }

        return $result = collect([$p_terpilih, $p_tidak_terpilih, $p_dapil_tidak, $p_partai_tidak, $p_kelamin_tidak, $p_pendidikan_tidak]);
    }

    public function age_count($date){
        $today = date("Y-m-d");
        $diff = date_diff(date_create($date), date_create($today));
        return $diff->format('%y');
    }

    public function reccomend(Dapil $dapil){
        
        return view('rekomendasi/rekomendasi', [
            'title' => 'Rekomendasi',
            'dapil' => $dapil,
            'result' => $this->simple_additive_weighting($dapil),
        ]);
    }

    public function show_detail(Caleg $caleg){
        switch ($caleg->pendidikan){
            case 1:
                $pendidikan = 'SMA atau sederajat';
                break;
            case 2:
                $pendidikan = 'Diploma';
                break;
            case 3:
                $pendidikan = 'Sarjana';
                break;
            case 4:
                $pendidikan = 'Magister';
                break;
            case 5:
                $pendidikan = 'Doktor';
                break;
        }

        switch ($caleg->penghasilan){
            case 1:
                $penghasilan = '< Rp. 3.000.000';
                break;
            case 2:
                $penghasilan = 'Rp. 3.000.000 - Rp. 4.999.999';
                break;
            case 3:
                $penghasilan = 'Rp. 5.000.000 - Rp. 6.999.000';
                break;
            case 4:
                $penghasilan = 'Rp. 7.000.000 - Rp. 10.000.000';
                break;
            case 5:
                $penghasilan = '> Rp. 10.000.000';
                break;
        }

        switch ($caleg->kekayaan){
            case 1:
                $kekayaan = '< Rp. 300 Juta';
                break;
            case 2:
                $kekayaan = 'Rp. 300 Juta - Rp. 699 Juta';
                break;
            case 3:
                $kekayaan = 'Rp. 700 Juta - Rp. 699 Juta';
                break;
            case 4:
                $kekayaan = '> Rp. 1 Milyar';
                break;
        }

        switch ($caleg->keanggotaan){
            case 1:
                $keanggotaan = '< 3 Tahun';
                break;
            case 2:
                $keanggotaan = '3 Tahun - 6 Tahun';
                break;
            case 3:
                $keanggotaan = '7 Tahun - 9 Tahun';
                break;
            case 4:
                $keanggotaan = '>= 10 Tahun';
                break;
        }

        switch ($caleg->pengalaman){
            case 1:
                $pengalaman = '< 5 Tahun';
                break;
            case 2:
                $pengalaman = '5 Tahun - 9 Tahun';
                break;
            case 3:
                $pengalaman = '10 Tahun - 14 Tahun';
                break;
            case 4:
                $pengalaman = '15 Tahun - 19 Tahun';
                break;
            case 5:
                $pengalaman = '>= 20 Tahun';
                break;
        }
        return view('rekomendasi/detail', [
            'title' => 'Detail',
            'data' => $caleg,
            'pendidikan' => $pendidikan,
            'pengalaman' => $pengalaman,
            'penghasilan' => $penghasilan,
            'keanggotaan' => $keanggotaan,
            'kekayaan' => $kekayaan,
            'umur' => $this->age_count($caleg->tanggal_lahir),
            'prediksi' => $this->naive_bayes_classifier($caleg)
        ]);
    }
}
