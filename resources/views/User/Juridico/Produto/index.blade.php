@extends('Layouts.layout_main')
@section('title', 'Meus produtos cadastrados')
@section('conteudo')

    @if ($roupas->isNotEmpty())
        <div class="container d-flex justify-content-center" style="min-height: 100vh;">
            <div id="livros-container" class="col-md-12 text-center">
                <div class="row mt-4">
                    <div class="col-2">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#storeRoupa">Cadastrar produto</button>
                    </div>
                    <div class="col-7">
                        <h2>Meus Produtos Cadastrados</h2>
                    </div>
                </div>
                <div id="card-container" class="row">
                    @foreach ($roupas as $roupa)
                        <div class="card col-md-3 mt-4 mx-4">
                            <img src="/img/roupas/{{ $roupa->imagem }}" alt="Imagem do produto" style="padding-top: 20px;">
                            <div class="card-body">
                                <p class="card-title"><strong>Tipo: </strong>{{ $roupa->tipo }}</p>
                                <p class="card-text"><strong>Valor: </strong>{{ $roupa->preco }}</p>
                                <p class="card-text"><strong>Estoque: </strong>{{ $roupa->quantidade }}</p>
                                <a href="{{ route('roupa.produto', ['id' => $roupa->id]) }}" class="btn bg-warning">Saber
                                    mais</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="d-flex justify-content-center mt-4">
            <div class="row">
                <div class="col-2">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#storeRoupa">Cadastrar produto</button>
                </div>

                <div class="col-7">
                    <h1>Ops estoque vazio</h1>
                </div>
            </div>
        </div>
    @endif

    <!--- Modal de Cadastro de roupas --->
    <div class="modal fade" id="storeRoupa" tabindex="-1" aria-labelledby="storeRoupaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5" id="storeRoupaLabel">{{ _('Cadastrar Produto') }}</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('roupa.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="tipo" class="form-label">{{ __('Tipo') }}</label>
                            <input type="text" class="form-control  @error('tipo') is-invalid @enderror" id="tipo"
                                name="tipo" placeholder="Vestido">
                            @error('tipo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tamanho" class="form-label">{{ __('Tamanho') }}</label>
                            <input type="text" class="form-control  @error('tamanho') is-invalid @enderror"
                                id="tamanho" name="tamanho" placeholder="GG">
                            @error('tamanho')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cor" class="form-label">{{ __('Cor') }}</label>
                            <input type="text" class="form-control  @error('cor') is-invalid @enderror" id="cor"
                                name="cor" placeholder="Azul Celeste">
                            @error('cor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">{{ __('Descrição') }}</label>
                            <textarea class="form-control  @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="5">
                                </textarea>
                            @error('descricao')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="preco" class="form-label">{{ __('Preço') }}</label>
                            <input type="number" step="any" class="form-control  @error('preco') is-invalid @enderror"
                                id="number_wallet" id="preco" name="preco" placeholder="100,89" min="1">
                            @error('preco')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="imagem" class="form-label">{{ __('Imagem') }}</label>
                            <input type="file" class="form-control-file" id="imagem" name="imagem"
                                placeholder="{{ $roupa->imagem }}">
                            @error('imagem')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-warning">Cadastrar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
