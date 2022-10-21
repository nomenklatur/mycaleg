<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Caleg;
use App\Models\Party;
use App\Models\Weight;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Caleg::factory(50)->create();

        DB::table('dapils')->insert([
            'kecamatan' => 'Padang Hilir dan Tebing Tinggi Kota',
        ]);

        DB::table('dapils')->insert([
            'kecamatan' => 'Padang Hulu dan Bajenis',
        ]);

        DB::table('dapils')->insert([
            'kecamatan' => 'Rambutan',
        ]);

        DB::table('parties')->insert([
            'nama' => 'PKB',
            'kepanjangan' => 'Partai Kebangkitan Bangsa',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'BERKARYA',
            'kepanjangan' => 'Partai Berkarya',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'DEMOKRAT',
            'kepanjangan' => 'Partai Demokrat',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'GARUDA',
            'kepanjangan' => 'Partai Gerakan Perubahan Indonesia',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'GERINDRA',
            'kepanjangan' => 'Partai Gerakan Indonesia Raya',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'GOLKAR',
            'kepanjangan' => 'Partai Golongan Karya',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'HANURA',
            'kepanjangan' => 'Partai Hati Nurani Rakyat',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'NASDEM',
            'kepanjangan' => 'Partai Nasional Demokratis',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'PAN',
            'kepanjangan' => 'Partai Amanat Nasional',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'PBB',
            'kepanjangan' => 'Partai Bulan Bintang',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'PDIP',
            'kepanjangan' => 'Partai Demokrasi Indonesia Perjuangan',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'PERINDO',
            'kepanjangan' => 'Partai Persatuan Indonesia',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'PKPI',
            'kepanjangan' => 'Partai Keadilan dan Persatuan Indonesia',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'PKS',
            'kepanjangan' => 'Partai Keadilan Sosial',
            'uri' => Str::random(50)
        ]);

        DB::table('parties')->insert([
            'nama' => 'PPP',
            'kepanjangan' => 'Partai Persatuan Pembangunan',
            'uri' => Str::random(50)
        ]);
    }
}
