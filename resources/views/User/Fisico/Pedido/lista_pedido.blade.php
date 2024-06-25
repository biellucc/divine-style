@extends('Layouts.layout_main')
@section('title', 'Lista de Pedidos')
@section('conteudo')

    @if ($pedidos->isNotEmpty())
        <div class="container d-flex justify-content-center" style="min-height: 100vh;">
            <div id="produtos-container" class="col-md-12 text-center">
                <div id="card-container" class="row justify-content-center">
                    @foreach ($pedidos as $pedido)
                        <div class="card col-12 col-sm-6 col-md-4 col-lg-3 mt-4 mx-4">
                            <img src="/img/pedidos/{{ $pedido->image }}" alt="Imagem do produto" class="card-img-top pt-3">
                            <div class="card-body">
                                <p class="card-title"><strong>Tipo: </strong>{{ $pedido->tipo }}</p>
                                <p class="card-text"><strong>Valor: </strong>{{ $pedido->preco }}</p>
                                <div class="row">
                                    <div class="col-5">
                                        <a href="{{ route('site.produto', ['id' => $pedido->id]) }}"
                                            class="btn bg-warning">{{ __('Sobre produto') }}</a>
                                    </div>
                                    <div class="col-5">
                                        <a href="{{ route('pedido.pedido', ['id' => $pedido->id]) }}" class="btn bg-success">{{ __('Saber do Pedido') }}</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="d-flex justify-content-center mt-4">
            <div>
                <h1>Ops! Sem pedidos</h1>
            </div>
        </div>
        </div>
    @endif

@endsection
