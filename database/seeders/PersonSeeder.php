<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Person::factory(10)
             ->create();
    }
}
