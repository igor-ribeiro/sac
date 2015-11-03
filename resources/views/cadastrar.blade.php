@extends ('template')

@section ('content')
    <h1>Cadastrar</h1>
    <hr>

    <form class="form" action="{{ route('cadastrar') }}" method="post">
        <div class="form-group col-md-6">
            <label for="nome">Nome do Cliente</label>
            <input class="form-control" type="text" name="nome" id="nome">
        </div>
        <div class="form-group col-md-6">
            <label for="email">E-mail</label>
            <input class="form-control" type="email" name="email" id="email">
        </div>

        <div class="form-group col-md-6">
            <label for="pedido">Nº Pedido</label>
            <input class="form-control" type="text" name="pedido" id="pedido">
        </div>
        <div class="form-group col-md-6">
            <label for="titulo">Título</label>
            <input class="form-control" type="email" name="titulo" id="titulo">
        </div>
        <div class="form-group col-md-12">
            <label for="observacao">Observação</label>
            <textarea class="form-control" name="observacao" id="observacao" rows="3"></textarea>
        </div>


        <div class="form-group col-md-12">
            <input class="btn btn-success" type="submit" value="Cadastrar">
        </div>
    </form>
@stop
