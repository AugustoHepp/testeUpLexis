
@extends('layouts.layout')


@section('cabecalho', 'Resultado da busca')

@section('conteudo')
    <h1>Artigos pesquisados</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Artigo</th>
                <th>Link</th>
                <th width="100">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artigos as $artigo)
                <tr>
                    <td>{{ $artigo->titulo }}</td>
                    <td>{{ $artigo->link }}</td>
                    <td>
                        <a href="{{ route('artigos.delete', $artigo->id) }}">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection 