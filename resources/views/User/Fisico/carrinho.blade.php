@extends('Layouts.layout_main')
@section('title', 'Meu Carrinho')
@section('conteudo')

    <main>

        @php
            $qntd = $carrinho?->roupas?->count();
        @endphp

        @if ($qntd > 0)

            <div class="d-flex  justify-content-center mt-4">
                <h2>Meu Carrinho</h2>
            </div>

            <div class="container mt-2">
                <div class="row">

                    <div class="col-md-5">
                        <table class="table">

                            <thead>
                                <tr>
                                    <td>Produto</td>
                                    <td>Preço</td>
                                    <td></td>
                                </tr>
                            </thead>

                            @foreach ($carrinho->roupas as $roupa)
                                <tbody>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="/assets/imagem/{{ $roupa->image }}" alt="Imagem do Livro"
                                                style="padding-top: 10; border-radius:6px">
                                            <div class="d-flex">
                                                <a class='link_product'
                                                    href="">{{ $roupa->tipo }}</a>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ $roupa->preco }}</td>
                                    <td>
                                        <form action="" method="POST">
                                            @csrf
                                            <input type="hidden" name='carrinho_id' value="{{ $carrinho->id }}">
                                            <input type="hidden" name='roupa_id' value="{{ $roupa->id }}">
                                            <button type="submit" style="background-color: transparent; border:none"><i
                                                    class='bx bx-x'></i></button>
                                        </form>

                                    </td>
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
                            <strong>${{ $carrinho->roupas->sum('preco') }}</strong>
                        </li>

                        <div class="mt-2">
                            <form action="{{ route('pedido.formulario_pedido') }}" method="GET">
                                <input type="hidden" name="carrinho_id" value="{{ $carrinho->id }}">
                                <button class="d-flex btn btn-warning">Realizar Pedido</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        @else
            <div class="d-flex justify-content-center mt-4">
                <h1>Ops carrinho vazio</h1>
            </div>
        @endif

    </main>

@endsection
