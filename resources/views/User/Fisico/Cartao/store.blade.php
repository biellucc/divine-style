@extends('Layouts.layout_main')

@section('title', 'Cadastrar Cartão')

@section('conteudo')

    <main>
        <form method="POST" action="{{ route('cartao.store') }}">
            @csrf

            <div class="d-flex justify-content-center container mt-5">
                <div class="card card border border-dark-subtle shadow p-3 mb-5 bg-body-tertiary rounded">

                    <div class="container">
                        <div class="row">

                            <div class="card-body col-md-6">
                                <label for="numero" class="form-label">{{ __('Número') }}</label>
                                <input type="text" class="form-control  @error('numero') is-invalid @enderror"
                                    id="numero" name="numero" placeholder="3456.5432.7895.1210">

                                @error('numero')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="card-body col-md-4">
                                <label for="tipo" class="form-label">{{ __('Tipo de Cartão') }}</label>
                                <select class="form-select" id="tipo" name="tipo">
                                    <option value="Crédito">Crédito</option>
                                    <option value="Débito">Débito</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="container mt-2">
                        <div class="row">

                            <div class="col-md-5">
                                <label for="cvc" class="form-label">{{ __('CVC') }}</label>
                                <input type="text" class="form-control @error('cvc') is-invalid @enderror" id="cvc"
                                    name="cvc" placeholder="345 ou 5467">

                                @error('cvc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="col-md-5">
                                <label for="validate" class="form-label">{{ __('Validade') }}</label>
                                <input type="date" class="form-control  @error('validate') is-invalid @enderror"
                                    id="validate" name="validate">

                                @error('validate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="d-flex justify-content-center container mt-1">
                <div class="d-grid gap-2 col-5 mx-auto shadow">
                    <button type="submit" class="btn btn-warning">Cadastrar</button>
                </div>
            </div>

        </form>

    </main>

@endsection
