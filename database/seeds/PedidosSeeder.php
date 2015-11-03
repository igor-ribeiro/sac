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
        $pedidos = [
            '2 roupas vermelhas',
            '3 sapatos masculinos',
            '1 calça e 1 sapato feminino',
            '1 camisa azul e 1 calça preta',
            '2 calças feminas',
        ];

        foreach ($pedidos as $pedido) {
            DB::table('pedidos')->insert([
                'descricao' => $pedido,
            ]);
        }
    }
}
