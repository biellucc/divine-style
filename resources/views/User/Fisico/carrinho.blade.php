@extends('Layouts.layout_main')
@section('title', 'Meu Carrinho')
@section('conteudo')

    <main>

        @php
            $qntd = $carts?->books?->count();
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

                            @foreach ($carts->books as $book)
                                <tbody>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="/assets/imagem/{{ $book->image }}" alt="Imagem do Livro"
                                                style="padding-top: 10; border-radius:6px">
                                            <div class="d-flex">
                                                <a class='link_product'
                                                    href="{{ route('site.view', ['id' => $book->id]) }}">{{ $book->title }}</a>
                                            </div>
                                        </div>

                                    </td>
                                    <td>{{ $book->value }}</td>
                                    <td>
                                        <form action="{{ route('carts_books.rm') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name='cart_id' value="{{ $carts->id }}">
                                            <input type="hidden" name='book_id' value="{{ $book->id }}">
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
                            <strong>${{ $carts->books->sum('value') }}</strong>
                        </li>
                        <hr class="my-1">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Frete (R$)</span>
                            <strong>$0</strong>
                        </li>
                        <hr class="my-1">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (R$)</span>
                            <strong>${{ $carts->books->sum('value') }}</strong>
                        </li>

                        <div class="mt-2">
                            <form action="{{ route('cart.pedido') }}" method="GET">
                                <input type="hidden" name="cart_id" value="{{ $carts->id }}">
                                <button class="d-flex btn btn-primary">Realizar Pedido</button>
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
