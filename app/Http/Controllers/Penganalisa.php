<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Dapil;
use App\Models\Caleg;
use App\Models\Party;
use App\Models\DataTraining;

class Penganalisa extends Controller
{
    public function normalisasi($caleg){
        $max_pendidikan = $caleg->max('pendidikan');
        $max_pengalaman = $caleg->max('pengalaman');
        $max_penghasilan = $caleg->max('penghasilan');
        $max_keanggotaan = $caleg->max('keanggotaan');
        $max_kekayaan = $caleg->max('kekayaan');
        $matriks_normal = collect([]);

        foreach ($caleg as $cal) {
            $matriks_normal->push(collect([
                'nama' => $cal->nama,
                'pendidikan' => number_format($cal->pendidikan / $max_pendidikan, 2),
                'pengalaman' => number_format($cal->pengalaman / $max_pengalaman, 2), 
                'penghasilan' => number_format($cal->penghasilan / $max_penghasilan, 2),
                'kekayaan' => number_format($cal->kekayaan / $max_kekayaan, 2),
                'keanggotaan' => number_format($cal->keanggotaan / $max_keanggotaan, 2),
                'preference' => (number_format(($cal->pendidikan / $max_pendidikan), 2) * 40) + (number_format(($cal->pengalaman / $max_pengalaman), 2) * 25) + (number_format(($cal->penghasilan / $max_penghasilan),2) * 10) + (number_format(($cal->keanggotaan / $max_keanggotaan),2) * 20) + (number_format(($cal->kekayaan / $max_kekayaan),2) * 5)
            ]));
        }

        return $matriks_normal;
    }

    public function prediksi($caleg){
        $dataTraining = DataTraining::all();
        $jumlah = count($dataTraining);
        $jumlah_ya =  count($dataTraining->where('terpilih', 'ya'));
        $jumlah_tidak = count($dataTraining->where('terpilih', 'tidak'));
        $p_partai_ya = count($dataTraining->where('terpilih', 'ya')->where('partai', $caleg->party_id ));
        $p_partai_tidak = count($dataTraining->where('terpilih', 'tidak')->where('partai', $caleg->party_id ));
        $p_kelamin_ya = count($dataTraining->where('terpilih', 'ya')->where('jenis_kelamin', $caleg->jenis_kelamin));
        $p_kelamin_tidak = count($dataTraining->where('terpilih', 'tidak')->where('jenis_kelamin', $caleg->jenis_kelamin));
        $p_pendidikan_ya = count($dataTraining->where('terpilih', 'ya')->where('pendidikan', $caleg->pendidikan));
        $p_pendidikan_tidak = count($dataTraining->where('terpilih', 'tidak')->where('pendidikan', $caleg->pendidikan));
        $p_dapil_ya = count($dataTraining->where('terpilih', 'ya')->where('iddapil', $caleg->dapil_id ));
        $p_dapil_tidak = count($dataTraining->where('terpilih', 'tidak')->where('iddapil', $caleg->dapil_id ));
        $partai_values = count($dataTraining->unique('partai'));
        $dapil_values = count($dataTraining->unique('iddapil'));
        $laplacian = False;

        if($p_partai_ya == 0 || $p_dapil_ya == 0 || $p_kelamin_ya == 0 || $p_pendidikan_ya == 0 || $p_pendidikan_tidak == 0){
            $laplacian = True;
            $p_terpilih = (($p_partai_ya + 1) / ($jumlah_ya + $partai_values)) * (($p_dapil_ya + 1) / ($jumlah_ya + $dapil_values)) * (($p_kelamin_ya + 1) / ($jumlah_ya + 2)) * (($p_pendidikan_ya + 1) / ($jumlah_ya + 5)) * ($jumlah_ya / $jumlah);
            $p_tidak_terpilih = (($p_partai_tidak + 1) / ($jumlah_tidak + $partai_values)) * (($p_dapil_tidak + 1) / ($jumlah_tidak + $dapil_values)) * (($p_kelamin_tidak + 1) / ($jumlah_tidak + 2)) * (($p_pendidikan_tidak + 1) / ($jumlah_tidak + 5)) * ($jumlah_tidak / $jumlah);
        }
        else{
            $p_terpilih = ($p_partai_ya / $jumlah_ya) * ($p_dapil_ya / $jumlah_ya) * ($p_kelamin_ya / $jumlah_ya) * ($p_pendidikan_ya / $jumlah_ya) * ($jumlah_ya / $jumlah);
            $p_tidak_terpilih = ($p_partai_tidak / $jumlah_tidak) * ($p_dapil_tidak / $jumlah_tidak) * ($p_kelamin_tidak / $jumlah_tidak) * ($p_pendidikan_tidak / $jumlah_tidak) * ($jumlah_tidak / $jumlah);
        }

        return $result = collect([
            'X1' => $caleg->party->nama,
            'X2' => $caleg->dapil_id,
            'X3' => $caleg->pendidikan,
            'X4' => $caleg->jenis_kelamin,
            'jlh_data' => $jumlah,
            'jlh_partai' => $partai_values,
            'jlh_dapil' => $dapil_values,
            'C1' => $jumlah_ya,
            'C2' => $jumlah_tidak,
            'X1C1' => $p_partai_ya,
            'X1C2' => $p_partai_tidak,
            'X2C1' => $p_dapil_ya,
            'X2C2' => $p_dapil_tidak,
            'X3C1' => $p_pendidikan_ya,
            'X3C2' => $p_pendidikan_tidak,
            'X4C1' => $p_kelamin_ya,
            'X4C2' => $p_kelamin_tidak,
            'jlh_partai' => $partai_values,
            'jlh_dapil' => $dapil_values,
            'prob_ya' => $p_terpilih,
            'prob_tidak' => $p_tidak_terpilih,
            'laplacian' => $laplacian
        ]);
    }

    public function show_saw(Dapil $dapil){
        return view('analisa/saw', [
            'title' => 'Analisa SAW',
            'm_awal' => $dapil->caleg,
            'm_normal' => $this->normalisasi($dapil->caleg),
        ]);
    }

    public function show_nbc(Caleg $caleg){
        return view('analisa/nbc', [
            'title' => 'Analisa NBC',
            'nbc' => $this->prediksi($caleg),
        ]);
    }
}
