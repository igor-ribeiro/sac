<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            DB::table('pedidos')->insert([
                'id_cliente' => $i,
            ]);
        }
    }
}
