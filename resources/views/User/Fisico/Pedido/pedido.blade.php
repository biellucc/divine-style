@extends('Layouts.layout_main')
@section('title', 'Meu Pedido')
@section('conteudo')

    <main>

        <div class="d-flex  justify-content-center mt-4">
            <h2>Pedido</h2>
        </div>

        <div class="container mt-2">
            <div class="row">

                <div class="col-md-8">
                    <table class="table">

                        <thead>
                            <tr>
                                <td>Produto</td>
                                <td>Preço</td>
                            </tr>
                        </thead>

                        @foreach ($carrinho->roupas as $roupa)
                            <tbody>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="/img/roupas/{{ $roupa->imagem }}" alt="Imagem do produto"
                                            style="padding-top: 10; border-radius:6px">
                                        <div class="d-flex">
                                            <a class='link_product'
                                                href="{{ route('site.produto', ['id' => $roupa->id]) }}">{{ $roupa->tipo }}</a>
                                        </div>
                                    </div>

                                </td>
                                <td>{{ $roupa->preco }}</td>
                            </tbody>
                        @endforeach

                    </table>
                </div>

                <div class="col-md-4 ">
                    <p class="d-flex justify-content-center">NOTINHA</p>
                    <hr class="my-1">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Sub-total (R$)</span>
                        <strong>${{ $carrinho->roupas->sum('preco') }}</strong>
                    </li>
                    <hr class="my-1">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Frete (R$)</span>
                        <strong>$0</strong>
                    </li>
                    <hr class="my-1">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (R$)</span>
                        <strong>${{ $pedido->valor }}</strong>
                    </li>
                    <hr class="my-1">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Data do Pedido</span>
                        <strong>{{ $pedido->created_at }}</strong>
                    </li>
                    <hr class="my-1">
                    <li class="mt-2 list-group-item d-flex justify-content-between">
                        <span>Status:</span>
                        <strong>{{ $pedido->status }}</strong>
                    </li>
                </div>


            </div>
        </div>

    </main>

@endsection
