@extends('Layouts.layout_main')
@section('title', 'Lista de Pedidos')
@section('conteudo')

    @if ($pedidos->isNotEmpty())
    <div class="d-flex justify-content-center mt-4">
        <h1 class="">Meus Pedidos</h1>
    </div>

        <div class="container d-flex justify-content-center" style="min-height: 100vh;">
            <div id="produtos-container" class="col-md-12 text-center">
                <div id="card-container" class="row justify-content-center">
                    @foreach ($pedidos as $pedido)
                        <div class="card col-12 col-sm-6 col-md-4 col-lg-3 mt-4 mx-4">
                            <div class="card-body">
                                <p class="card-text"><strong>Status: </strong>{{ $pedido->status }}</p>
                                <p class="card-text"><strong>Valor: </strong>{{ $pedido->valor }}</p>
                                <div class="row">
                                    <div class="col-5">
                                        <a href="{{ route('site.produto', ['id' => $pedido->id]) }}"
                                            class="btn btn-warning">{{ __('Produto') }}</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{ route('pedido.pedido', ['id' => $pedido->id]) }}" class="btn btn-success">{{ __('Pedido') }}</a>
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
