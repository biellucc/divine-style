<?php

namespace Database\Seeders;

use App\Models\Juridico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuridicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Juridico::factory(5)->create();
    }
}
