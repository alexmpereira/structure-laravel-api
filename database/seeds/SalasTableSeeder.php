<?php

use Illuminate\Database\Seeder;
use App\Sala;

class SalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sala::create([
            'descricao'      => 'Sala A'
        ]);
    }
}
