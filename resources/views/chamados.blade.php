@extends ('template')

@section ('content')
    <h1>Chamados</h1>
    <hr>

    @if ($chamados->count() < 1)
        <p>Nenhum chamado encontrado.</p>
    @else
        <table class="table table-striped table-hover">
            <thead>
                <th></th>
                <th>
                    <a href="{{ $pedidoFiltro }}">Nº Pedido</a>
                    <span class="glyphicon glyphicon-triangle-{{ $pedidoFiltroIcone }}"></span>
                </th>
                <th>
                    <a href="{{ $emailFiltro }}">E-Mail</a>
                    <span class="glyphicon glyphicon-triangle-{{ $emailFiltroIcone }}"></span>
                </th>
                <th>Título</th>
            </thead>
            <tbody>
                @foreach ($chamados as $chamado)
                    <tr>
                        <td><a href="#/chamado/{{ $chamado->id }}" class="btn btn-default glyphicon glyphicon-search"></a></td>
                        <td>{{ $chamado->pedido->id }}</td>
                        <td>{{ $chamado->cliente->email }}</td>
                        <td>{{ $chamado->titulo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {!! $paginacao !!}
@stop
