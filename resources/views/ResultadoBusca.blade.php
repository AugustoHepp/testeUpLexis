
@extends('layouts.layout')

@section('conteudo')
    <h1>Artigos pesquisados</h1>
    <h2>
        <a href="{{ route('index') }}">Nova busca</a>
    </h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Artigo</th>
                <th>Link</th>
                <th width="100">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artigos as $artigo)
                <tr>
                    <td>{{ $artigo->titulo }}</td>
                    <td><a href="{{ $artigo->link }}">{{ $artigo->link }}</a></td>
                    <td>
                        <a href="{{ route('artigos.delete', $artigo->id) }}" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection 