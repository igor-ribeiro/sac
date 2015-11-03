<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChamadosController extends Controller {

    public function getChamados(Request $request)
    {
        $orders = [
            'pedido' => 'pedidos.id',
            'email'  => 'clientes.email',
        ];

        $orderby = (isset($request['orderby']))
            ? $orders[$request['orderby']]
            : $orders['pedido'];

        $order = (isset($request['order']))
            ? $request['order']
            : 'asc';

        $pedidoFiltro = '?orderby=pedido&order=';
        $emailFiltro  = '?orderby=email&order=';

        $pedidoFiltroIcone = 'bottom';
        $emailFiltroIcone  = 'bottom';

        if ($request['orderby'] === 'pedido') {
            if ($order === 'asc') {
                $pedidoFiltro      .= 'desc';
                $pedidoFiltroIcone  = 'top';
            } else {
                $pedidoFiltro      .= 'asc';
                $pedidoFiltroIcone  = 'bottom';
            }
        } else {
            $pedidoFiltro .= 'asc';
        }

        if ($request['orderby'] === 'email') {
            if ($order === 'asc') {
                $emailFiltro      .= 'desc';
                $emailFiltroIcone  = 'top';
            } else {
                $emailFiltro      .= 'asc';
                $emailFiltroIcone  = 'bottom';
            }
        } else {
            $emailFiltro .= 'asc';
        }

        $chamados = Chamado::select('chamados.*')
            ->join('pedidos', 'pedidos.id', '=', 'chamados.id_pedido')
            ->join('clientes', 'clientes.id', '=', 'chamados.id_cliente')
            ->orderby($orderby, $order)
            ->paginate(5);

        $paginacao = $chamados->appends([
            'orderby' => (isset($request['orderby'])) ? $request['orderby'] : 'pedido',
            'order'   => (isset($request['order'])) ? $request['order'] : 'asc',
        ])->render();

        return view('chamados')
            ->with('chamados', $chamados)
            ->with('paginacao', $paginacao)
            ->with('pedidoFiltro', $pedidoFiltro)
            ->with('pedidoFiltroIcone', $pedidoFiltroIcone)
            ->with('emailFiltroIcone', $emailFiltroIcone)
            ->with('emailFiltro', $emailFiltro);
    }

    public function getChamado($id)
    {
        $chamado = Chamado::findOrFail($id);

        return response()->json([
            'cliente' => [
                'nome'  => $chamado->cliente->nome,
                'email' => $chamado->cliente->email,
            ],
            'pedido' => [
                'numero'    => $chamado->pedido->id,
                'descricao' => $chamado->pedido->descricao,
            ],
            'chamado' => [
                'numero'     => $chamado->id,
                'titulo'     => $chamado->titulo,
                'observacao' => $chamado->observacao,
            ]
        ]);
    }

    public function getCadastrarChamado()
    {
        return view('cadastrar');
    }

    public function postCadastrarChamado(Request $request)
    {
        $this->validate($request, [
            'pedido.numero'  => 'required|exists:pedidos,id|',
            'cliente.email'  => 'required|email',
            'chamado.titulo' => 'required',
        ]);

        $cliente = Cliente::firstOrNew([
            'email' => $request->cliente['email'],
        ]);

        $pedido = Pedido::find($request->pedido['numero']);

        // se o cliente não existir, verifica se um nome
        // foi fornecido e cadastra o clinte com o nome
        if (!isset($cliente->id)) {
            if (empty($request->cliente['nome'])) {
                $this->validate($request, [
                    'cliente.nome' => 'required',
                ]);
            } else {
                $cliente->nome = $request->cliente['nome'];
            }

            if (!$cliente->save()) {
                return response('Erro ao salvar o cliente: ' . $cliente->nome, 400);
            }
        }

        $chamado = Chamado::create([
            'id_cliente' => $cliente->id,
            'id_pedido'  => $pedido->id,
            'titulo'     => $request->chamado['titulo'],
            'observacao' => nl2br($request->chamado['observacao']),
        ]);

        if (!$chamado->save()) {
            return response('Erro ao salvar o chamado', 400);
        }



        return response('Chamado cadastrado com sucesso! <a href="#/chamado/' . $chamado->id . '">Clique aqui</a> para ver o chamado.', 200);
    }

}
