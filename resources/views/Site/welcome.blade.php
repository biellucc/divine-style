@extends('Layouts.layout_main')
@section('title', 'Index')
@section('conteudo')

    @if ($roupas->isNotEmpty())
        <div class="container d-flex justify-content-center" style="min-height: 100vh;">
            <div id="produtos-container" class="col-md-12 text-center">
                <div id="card-container" class="row justify-content-center">
                    @foreach ($roupas as $roupa)
                        <div class="card col-12 col-sm-6 col-md-4 col-lg-3 mt-4 mx-4">
                            <img src="/img/roupas/{{ $roupa->image }}" alt="Imagem do produto" class="card-img-top pt-3">
                            <div class="card-body">
                                <p class="card-title"><strong>Tipo: </strong>{{ $roupa->tipo }}</p>
                                <p class="card-text"><strong>Valor: </strong>{{ $roupa->preco }}</p>
                                <a href="{{ route('site.produto', ['id' => $roupa->id]) }}"
                                    class="btn bg-warning">{{ __('Mais Informações') }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="d-flex justify-content-center mt-4">
            <div>
                <h1>Ops! Sem produtos</h1>
            </div>
        </div>
        </div>
    @endif


@endsection
