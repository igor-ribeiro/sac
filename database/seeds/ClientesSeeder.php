<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            [
                'nome'  => 'Ana Maria Braga',
                'email' => 'ana.maria@email.com',
            ],
            [
                'nome'  => 'Roberto Carlos',
                'email' => 'rei@email.com',
            ],
            [
                'nome'  => 'Datena',
                'email' => 'datena@email.com',
            ],
            [
                'nome'  => 'Xuxa',
                'email' => 'xuxa@email.com',
            ],
            [
                'nome'  => 'Ronaldo',
                'email' => 'brilhamuito@email.com',
            ],
        ];

        foreach ($clientes as $cliente) {
            DB::table('clientes')->insert($cliente);
        }
    }
}
