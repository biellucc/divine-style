@extends('Layouts.layout_main')
@section('title', 'Index')
@section('conteudo')

<div class="container d-flex justify-content-center" style="min-height: 100vh;">
    <div id="livros-container" class="col-md-12 text-center">
        <div id="card-container" class="row">
            @foreach ($roupas as $roupa)
                <div class="card col-md-3 mt-4 mx-4">
                    <img src="/img/roupas/{{ $roupa->image }}" alt="Imagem do produto" style="padding-top: 20px;">
                    <div class="card-body">
                        <p class="card-title"><strong>Tipo: </strong>{{ $roupa->tipo }}</p>
                        <p class="card-text"><strong>Valor: </strong>{{ $roupa->preco }}</p>
                        <a href="{{ route('site.produto', ['id' => $roupa->id]) }}" class="btn bg-warning">{{ __('Mais Informações') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
