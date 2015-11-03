@extends ('template')

@section ('content')
    <h1>Chamados</h1>
    <hr>

    @if ($chamados->count() < 1)
        <p>Nenhum chamado encontrado.</p>
    @else
        <table class="table table-striped table-hover">
            <thead>
                <th>Nº Pedido</th>
                <th>E-Mail</th>
                <th>Título</th>
            </thead>
            <tbody>
                @foreach ($chamados as $chamado)
                    <tr>
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
