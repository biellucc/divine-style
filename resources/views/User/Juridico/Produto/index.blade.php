@extends('Layouts.layout_main')
@section('title', 'Meus Produtos')
@section('conteudo')

<div class="container d-flex justify-content-center" style="min-height: 100vh;">
<div id="livros-container" class="col-md-12 text-center">
    <h2 class="mt-4">Meus Produtos Cadastrados</h2>
    <div id="card-container" class="row">
        @foreach ($roupas as $roupa)
        <div class="card col-md-3 mt-4 mx-4">
            <img src="/assets/imagem/{{ $roupa->image }}" alt="Imagem do Livro" style="padding-top: 20px;">
            <div class="card-body">
                <p class="card-title"><strong>Tipo: </strong>{{ $roupa->tipo }}</p>
                <p class="card-text"><strong>Valor: </strong>{{ $roupa->preco }}</p>
                <p class="card-text"><strong>Estoque: </strong>{{ $roupa->quantidade }}</p>
                <a href="{{ route('roupa.produto', ['id' => $roupa->id]) }}" class="btn bg-warning">Saber mais</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

@endsection
