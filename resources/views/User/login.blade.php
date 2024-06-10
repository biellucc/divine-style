@extends('Layouts.layout_main')
@section('title', 'Login')
@section('conteudo')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <div class="card shadow-lg">
                    <div class="card-header col text-center bg-warning">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login.login') }}">
                            @csrf

                            @error('error')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Senha') }}</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="checkbox" id="remember" name="remember" value="true">
                                <label for="remember">Manter logado</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-warning">{{ __('Entrar') }}</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
