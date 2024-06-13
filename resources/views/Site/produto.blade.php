@extends('Layouts.layout_main')
@section('title', 'Produto')
@section('conteudo')

    <div class="container">
        <div class="row mt-4">

            <div class="col-8">
                <div>
                    <img src="/public/assets/{{ $produto->imagem }}" alt="{{ $produto->tipo }}" class="img-fluid">
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <button type="submit" href="{{ route('carrinho.add') }}" class="btn btn-warning">{{ _('Adicionar ao carrinho') }}</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" href="" class="btn btn-success">{{ _('Comprar') }}</button>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div>
                    <h2>{{ $produto->tipo }}</h2>
                    <p><span>Empresa Vendedora: {{ $produto->juridico->nomeEmpresarial }}</span></p>
                    <p><span>Cor: {{ $produto->cor }}</span></p>
                    <p><span>Tamanho: {{ $produto->tamanho }}</span></p>
                    <p><span>Preço: {{ $produto->preco }}</span></p>
                </div>
                <div class="mt-2">
                    <h4>{{ _('Descrição') }}</h4>
                    <p><span>{{ $produto->descricao }}</span></p>
                </div>
                <div class="mt-2">
                    <h4>{{ _('Informações do Vendedor') }}</h4>
                    <p><span>Nome: {{ $produto->juridico->nomeEmpresarial }}</span></p>
                    <p><span>Email: {{ $produto->juridico->usuario->email }}</span></p>
                    <p><span>Telefone: {{ $produto->juridico->usuario->telefone }}</span></p>
                </div>
                <div class="mt-2">
                    <h4>{{ _('Endereço do Vendedor') }}</h4>
                    <p><span>País: {{ $produto->juridico->usuario->endereco->pais }}</span></p>
                    <p><span>Estado: {{ $produto->juridico->usuario->endereco->estado }}</span></p>
                    <p><span>Cidade: {{ $produto->juridico->usuario->endereco->cidade }}</span></p>
                    <p><span>Bairro: {{ $produto->juridico->usuario->endereco->bairro }}</span></p>
                    <p><span>Endereço: {{ $produto->juridico->usuario->endereco->endereco }}, {{ $produto->juridico->usuario->endereco->logradouro }}</span></p>
                </div>
            </div>

        </div>

        <div class="border-bottom border-light-subtle">
            <h5>{{ __('Comentários') }}</h5>
        </div>
    </div>

@endsection
