<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        Party::factory(15)->create();

        DB::table('dapils')->insert([
            'kecamatan' => 'Padang Hilir dan Tebing Tinggi Kota',
        ]);

        DB::table('dapils')->insert([
            'kecamatan' => 'Padang Hulu dan Bajenis',
        ]);

        DB::table('dapils')->insert([
            'kecamatan' => 'Rambutan',
        ]);

        DB::table('weights')->insert([
            'pendidikan' => 40,
            'penghasilan' => 10,
            'kekayaan' => 5,
            'pengalaman' => 25,
            'keanggotaan' => 20,
        ]);
    }
}
