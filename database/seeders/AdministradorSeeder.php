<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for($i = 0; $i < 10; $i++){
            DB::table('administradors')->insert(['cpf' => rand(10000000000, 99999999999), 'nome' => 'Edgar',
                'email' => 'edgar.carvalho' . $i . '@hotmail.com', 'senha' => 'password']);
        }
    }
}
