<?php

namespace Database\Seeders;

use App\Models\Denuncia;
use Illuminate\Database\Seeder;

class DenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Denuncia::factory()->count(20)->create();
    }
}
