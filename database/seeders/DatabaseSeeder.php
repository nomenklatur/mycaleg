<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Caleg;
use App\Models\Party;
use App\Models\Criteria;

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
        Criteria::factory(50)->create();
    }
}
