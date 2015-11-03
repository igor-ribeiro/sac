@extends ('template')

@section ('content')
    <h1>Cadastrar</h1>
    <hr>

    @if ($errors->count())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form class="form js-cadastrar-chamado" action="{{ route('cadastrar') }}" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="control-label" for="cliente-nome">Nome do Cliente</label>
                <input class="form-control" type="text" name="cliente[nome]" id="cliente-nome" value="{{ old('cliente.nome') }}">
            </div>
            <div class="form-group col-md-6">
                <label class="control-label" for="cliente-email">E-mail</label>
                <input class="form-control" type="email" name="cliente[email]" id="cliente-email" value="{{ old('cliente.email') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label class="control-label" for="pedido-numero">Nº Pedido</label>
                <input class="form-control" type="text" name="pedido[numero]" id="pedido-numero" value="{{ old('pedido.numero') }}">
            </div>
            <div class="form-group col-md-6">
                <label class="control-label" for="chamado-titulo">Título</label>
                <input class="form-control" type="text" name="chamado[titulo]" id="chamado-titulo" value="{{ old('chamado.titulo') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="control-label" for="chamado-observacao">Observação</label>
                <textarea class="form-control" name="chamado[observacao]" id="chamado-observacao" rows="3">{{ old('chamado.observacao') }}</textarea>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-success ladda-button" data-style="expand-left">
            <span class="ladda-label">Cadastrar</span>
        </button>
    </form>
@stop
