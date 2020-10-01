<?php

namespace Database\Seeders;

use App\Models\Avaliacao;
use Illuminate\Database\Seeder;

class AvaliacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Avaliacao::factory()->count(50)->create();
    }
}
