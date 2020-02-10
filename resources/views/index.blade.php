@extends('layouts.layout')

@section('title', 'Pesquisa de artigos')

@section('conteudo')
    <h1>Pesquisa de artigos</h1>
    
    <div>
        <form action=" {{ route('artigos.index') }}" method="POST">
            @method('POST')
            @csrf
            <input type="text" id="txtBusca" required name="txtBusca" />
            <input type="submit" name="pesquisar" />

        </form>
    </div>
    @if(session()->has('jsAlert'))
        <script type="text/javascript" >
            alert({{ session()->get('jsAlert') }});
        </script>
    @endif 
@endsection    