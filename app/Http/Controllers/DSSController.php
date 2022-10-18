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
        return view('pilih_dapil', [
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
                'norm_pendidikan' => (($item->pendidikan / $max_pendidikan) * 40),
                'norm_pengalaman' => (($item->pengalaman / $max_pengalaman) * 25),
                'norm_penghasilan' => (($item->penghasilan / $max_penghasilan) * 10),
                'norm_keanggotaan' => (($item->keanggotaan / $max_keanggotaan) * 20),
                'norm_kekayaan' => (($item->kekayaan / $max_kekayaan) * 5),
                'preference' => (($item->pendidikan / $max_pendidikan) * 40) + (($item->pengalaman / $max_pengalaman) * 25) + (($item->penghasilan / $max_penghasilan) * 10) + (($item->keanggotaan / $max_keanggotaan) * 20) + (($item->kekayaan / $max_kekayaan) * 5)
            ]));
        }
        return view('rekomendasi', [
            'title' => 'Rekomendasi',
            'ternormalisasi' => $normalized->sortByDesc('preference'),
            'max_pend' => $max_pendidikan,
            'max_peng' => $max_pengalaman,
            'max_keka' => $max_kekayaan,
            'max_kean' => $max_keanggotaan,
            'max_phsl' => $max_penghasilan,
        ]);
    }
}
