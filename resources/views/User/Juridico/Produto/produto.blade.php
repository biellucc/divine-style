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
                    <div class="col-2">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#alteracaoModal">Alterar</button>
                    </div>
                    <div class="col-2">
                        <form action="{{ route('roupa.deletar') }}" method="POST">
                            @csrf
                            <input type="hidden" preco="{{ $produto->id }}" name="roupa_id">
                            <button type="button" class="btn btn-danger">Deletar</button>
                        </form>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('roupa.index') }}" class="btn btn-success">Voltar</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div>
                    <h2>{{ $produto->tipo }}</h2>
                    <p><span>Empresa Vendedora: {{ $produto->juridico?->nomeEmpresarial }}</span></p>
                    <p><span>Cor: {{ $produto?->cor }}</span></p>
                    <p><span>Tamanho: {{ $produto?->tamanho }}</span></p>
                    <p><span>Preço: {{ $produto?->preco }}</span></p>
                </div>
                <div class="mt-2">
                    <h4>{{ _('Descrição') }}</h4>
                    <p><span>{{ $produto?->descricao }}</span></p>
                </div>

        </div>

        <div class="border-bottom border-light-subtle">
            <h5>{{ __('Comentários') }}</h5>
        </div>
    </div>

    <!-- Modal Alterar atributos da Roupa-->
    <div class="modal fade" id="alteracaoModal" tabindex="-1" aria-labelledby="alteracaoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5" id="alteracaoModalLabel">Alterar dados do Produto {{ $produto->tipo }}</h1>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('roupa.alterar') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="tipo" class="form-label">{{ __('Tipo') }}</label>
                            <input type="text" class="form-control  @error('tipo') is-invalid @enderror" id="tipo"
                                name="tipo" value="{{ $produto->tipo }}">
                            @error('tipo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tamanho" class="form-label">{{ __('Tamanho') }}</label>
                            <input type="text" class="form-control  @error('tamanho') is-invalid @enderror"
                                id="tamanho" name="tamanho" value="{{ $produto->tamanho }}">
                            @error('tamanho')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cor" class="form-label">{{ __('Cor') }}</label>
                            <input type="text" class="form-control  @error('cor') is-invalid @enderror" id="cor"
                                name="cor" value="{{ $produto->cor }}">
                            @error('cor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">{{ __('Descrição') }}</label>
                            <input type="text" class="form-control  @error('descricao') is-invalid @enderror" id="descricao"
                                name="descricao" value="{{ $produto->descricao }}">
                            @error('descricao')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="preco" class="form-label">{{ __('Preço') }}</label>
                            <input type="number" step="any"
                                class="form-control  @error('preco') is-invalid @enderror" id="number_wallet"
                                id="preco" name="preco" value="{{ $produto->preco }}" min="1">
                            @error('preco')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="imagem" class="form-label">{{ __('Imagem') }}</label>
                            <input type="file" class="form-control-file" id="imagem" name="imagem" value="{{ $produto->imagem }}">
                            @error('imagem')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                            <button type="submit" class="btn btn-warning">{{ __('Alterar') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
