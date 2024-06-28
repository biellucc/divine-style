@extends('Layouts.layout_main')
@section('title', 'Realizar Pedido')
@section('conteudo')

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Pedido</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Seu Carrinho</span>
                        <span class="badge bg-primary rounded-pill">{{ $carrinho->roupas->count() }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach ($carrinho->roupas as $roupa)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $roupa->tipo }}</h6>
                                    <small class="text-body-secondary">{{ $roupa->tamanho }}</small>
                                    <small class="text-body-secondary">{{ $roupa->cor }}</small>
                                </div>
                                <span class="text-body-secondary">${{ $roupa->preco }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (Real)</span>
                            <strong>${{ $carrinho->roupas->sum('preco') }}</strong>
                        </li>
                    </ul>
                </div>

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Endereço de cobrança</h4>
                    <form action="{{ route('pedido.adicionar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="nome" class="form-label">Primeiro Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder=""
                                    value="{{ $carrinho->fisico?->nome }}">
                                    @error('nome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="sobrenome" class="form-label">Segundo Nome</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder=""
                                    value="{{ $carrinho->fisico?->sobrenome }}">
                                    @error('sobrenome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-8">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder=""
                                    value="{{ $carrinho->fisico->usuario?->email }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" placeholder=""
                                    value="{{ $carrinho->fisico->usuario?->telefone }}">
                                    @error('telefone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" name="cep" id="cep" placeholder=""
                                    value="{{ $carrinho->fisico->usuario->endereco?->cep }}">
                                    @error('cep')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-5">
                                <label for="pais" class="form-label">Pais</label>
                                <input type="text" class="form-control" name="pais" id="pais" placeholder=""
                                    value="{{ $carrinho->fisico->usuario->endereco?->pais }}">
                                    @error('pais')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" placeholder=""
                                    value="{{ $carrinho->fisico->usuario->endereco?->estado }}">
                                    @error('estado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-5">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder=""
                                    value="{{ $carrinho->fisico->usuario->endereco?->cidade }}">
                                    @error('cidade')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-7">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" name="bairro" id="bairro" placeholder=""
                                    value="{{ $carrinho->fisico->usuario->endereco?->bairro }}">
                                    @error('bairro')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-9">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco"
                                    placeholder="" value="{{ $carrinho->fisico->usuario->endereco?->endereco }}">
                                    @error('endereco')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="n_residencia" class="form-label">Número da casa</label>
                                <input type="number" class="form-control" id="n_residencia" name="n_residencia"
                                    placeholder="" value="{{ $carrinho->fisico->usuario->endereco?->n_residencia }}">
                                    @error('n_residencia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="cartao" class="form-label">Cartão</label>
                                <select class="form-select" id="cartao" name="cartao">
                                    @foreach ($carrinho->fisico->cartao as $cartao_sozinho)
                                        <option value="{{ $cartao_sozinho->id }}">número: {{ $cartao_sozinho->numero }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cartao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>

                            <hr class="my-4">

                            <input type="hidden" value="{{ $carrinho->id }}" name="carrinho_id">
                            <input type="hidden" value="{{ $carrinho->roupas->sum('preco') }}" name="valor">
                            <button class="w-100 btn btn-warning btn-lg" type="submit">Confirmar Pedido</button>
                        </div>
                    </form>
                </div>

            </div>

        </main>
    </div>

@endsection
