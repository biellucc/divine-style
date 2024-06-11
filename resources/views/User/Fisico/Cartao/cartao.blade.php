@extends('Layouts.layout_main')
@section('title', 'Meus Cartões')
@section('conteudo')

    <main>

        <div class="d-flex justify-content-center mt-4">
            <h2>Cartões Cadastrados</h2>
        </div>

        <div class="container mt-3">
            <div class="row">

                @foreach ($cartaos as $cartao)
                    <div class="col-md-4 mb-3">
                        <div class="card border border-dark-subtle shadow p-3 mb-5 bg-body-tertiary rounded">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <h5 class="card-title">{{ $cartao->numero }}</h5>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <h5 class="card-title">{{ $cartao->tipo }}</h5>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="card-text"><strong>CVC: </strong>{{ $cartao->cvc }}</p>
                                        </div>
                                        <div class="col-8">
                                            <p class="card-text"><strong>Validade: </strong>{{ $cartao->validade }}</p>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('cartao.controle', ['id' => $cartao->id]) }}" method="GET">
                                    @csrf

                                    <div class="d-flex container mt-2">
                                        <div class="row">

                                            <div class="col-9">
                                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                                                    data-bs-target="#modalcartaoUpdate">Alterar</button>
                                            </div>

                                            <div class="col-3">
                                                <input type="hidden" name="cartao_id" value="{{ $cartao->id }}">
                                                <input type="submit"class="btn btn-outline-danger" name="action"
                                                    value="deletar"></input>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Modal Atualizar cartao -->
        <div class="modal fade" id="modalcartaoUpdate" tabindex="-1" role="dialog"
            aria-labelledby="modalcartaoUpdateLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalcartaoUpdateLabel">Alterar Cartão</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('cartao.controle', ['id' => $cartao->id]) }}" method="GET">
                            @csrf
                            <div class="form-group">
                                <label for="cvc">CVC</label>
                                <input type="text" class="form-control" id="cvc" name="cvc"
                                    placeholder="{{ $cartao->cvc }}">
                            </div>
                            <div class="form-group mt-2">
                                <label type="text" for="numero">Número do
                                    Cartão</label>
                                <input class="form-control" id="numero" name="numero"
                                    placeholder="{{ $cartao->numero }}">
                            </div>
                            <div class="form-group mt-2">
                                <label type="text" for="validade">Validade</label>
                                <input class="form-control" id="validade" name="validade"
                                    placeholder="{{ $cartao->validade }}">
                            </div>
                            <div class="form-group mt-2">
                                <label for="tipo" class="form-label">Tipo de Cartão</label>
                                <select class="form-select" id="tipo" name="tipo">
                                    <option value="Crédito">Crédito</option>
                                    <option value="Débito">Débito</option>
                                </select>
                            </div>
                            <input type="hidden" name="cartao_id" value="{{ $cartao->id }}">
                            <input type="submit" class="btn btn-primary mt-3" name="action" value="salvar"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection
