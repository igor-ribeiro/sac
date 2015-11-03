<?php

namespace App\Http\Controllers;

use App\Models\Chamado;

class ChamadosController extends Controller {

    public function getChamados()
    {
        $chamados = Chamado::paginate(5);

        return view('chamados')
            ->with('chamados', $chamados)
            ->with('paginacao', $chamados->render());
    }

    public function getCadastrarChamado()
    {
        return view('cadastrar');
    }

}
