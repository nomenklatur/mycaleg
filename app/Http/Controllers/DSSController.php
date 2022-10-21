<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Dapil;
use App\Models\Caleg;
use App\Models\Party;
use App\Models\Weight;

class DSSController extends Controller
{
    public function index(){
        return view('rekomendasi/pilih_dapil', [
            'title' => 'Pilih Dapil',
        ]);
    }

    public function saw(Dapil $dapil){
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
                'preference' => (($item->pendidikan / $max_pendidikan) * 40) + (($item->pengalaman / $max_pengalaman) * 25) + (($item->penghasilan / $max_penghasilan) * 10) + (($item->keanggotaan / $max_keanggotaan) * 20) + (($item->kekayaan / $max_kekayaan) * 5)
            ]));
        }
        return view('rekomendasi/rekomendasi', [
            'title' => 'Rekomendasi',
            'dapil' => $dapil->kecamatan,
            'result' => $normalized->sortByDesc('preference')->values(),
        ]);
    }

    public function nbc(Caleg $caleg){

        return view('rekomendasi/detail_caleg', [
            'title' => 'Detail',
            
        ]);
    }
}
