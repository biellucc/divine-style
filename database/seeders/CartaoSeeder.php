<?php

namespace Database\Seeders;

use App\Models\Cartao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cartao::factory(7)->create();
    }
}
