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
                'pendidikan' => $cal->pendidikan / $max_pendidikan,
                'pengalaman' => $cal->pengalaman / $max_pengalaman, 
                'penghasilan' => $cal->penghasilan / $max_penghasilan,
                'kekayaan' => $cal->kekayaan / $max_kekayaan,
                'keanggotaan' => $cal->keanggotaan / $max_keanggotaan,
                'preference' => (($cal->pendidikan / $max_pendidikan) * 40) + (($cal->pengalaman / $max_pengalaman) * 25) + (($cal->penghasilan / $max_penghasilan) * 10) + (($cal->keanggotaan / $max_keanggotaan) * 20) + (($cal->kekayaan / $max_kekayaan) * 5)
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
        $p_dapil_ya = count($dataTraining->where('terpilih', 'ya')->where('iddapil', $caleg->dapil_id ));
        $p_dapil_tidak = count($dataTraining->where('terpilih', 'tidak')->where('iddapil', $caleg->dapil_id ));
        $partai_values = count($dataTraining->unique('partai'));
        $dapil_values = count($dataTraining->unique('iddapil'));

        if($p_partai_ya == 0 || $p_dapil_ya == 0){
            
            $p_terpilih = (($p_partai_ya + 1) / ($jumlah_ya + $partai_values)) * (($p_dapil_ya + 1) / ($jumlah_ya + $dapil_values)) * ($jumlah_ya / $jumlah);
            $p_tidak_terpilih = (($p_partai_tidak + 1) / ($jumlah_tidak + $partai_values)) * (($p_dapil_tidak + 1) / ($jumlah_tidak + $dapil_values)) * ($jumlah_tidak / $jumlah);
        }
        else{
            $p_terpilih = ($p_partai_ya / $jumlah_ya) * ($p_dapil_ya / $jumlah_ya) * ($jumlah_ya / $jumlah);
            $p_tidak_terpilih = ($p_partai_tidak / $jumlah_tidak) * ($p_dapil_tidak / $jumlah_tidak) * ($jumlah_tidak / $jumlah);
        }

        return $result = collect([
            'X1' => $caleg->party->nama,
            'X2' => $caleg->dapil_id,
            'jlh_data' => $jumlah,
            'C1' => $jumlah_ya,
            'C2' => $jumlah_tidak,
            'X1C1' => $p_partai_ya,
            'X1C2' => $p_partai_tidak,
            'X2C1' => $p_dapil_ya,
            'X2C2' => $p_dapil_tidak,
            'jlh_partai' => $partai_values,
            'jlh_dapil' => $dapil_values,
            'prob_ya' => $p_terpilih,
            'prob_tidak' => $p_tidak_terpilih
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
