<?php

namespace Database\Seeders;

use App\Models\Fisico;
use Database\Factories\FisicoSeederFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FisicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fisico::factory(5)->create();
    }
}
