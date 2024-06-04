@extends('Layouts.layout_main')
@section('title', 'Registrar')
@section('conteudo')

    <div class="container">
        <form action="{{ route('user.cadastro') }}" method="POST">
            @csrf
            <!-- Dados do Usuário -->
            <h2 class="mt-4 text-center">Dados do Usuário</h2>

            <div class="row">
                <div class="col-md-6-mb-3">
                    <label for="tipoUsuario" class="form-label">Escolha o tipo de usuário:</label>
                    <select class="form-select" id="tipoUsuario" name="tipoUsuario" onchange="showFields(this.value)">
                        <option value="cliente">Cliente</option>
                        <option value="vendedor">Vendedor</option>
                    </select>
                </div>

                <div class="col-mb-3">
                    <div id="clienteFields" style="display: none">

                        <div class="row mt-2">
                            <div class="col-md-6 mb-3">
                                <label for="nome" class="form-label">Primeiro Nome:</label>
                                <input type="text" class="form-control  @error('nome') is-invalid @enderror"
                                    id="nome" name="nome" placeholder="Gabriel">
                                @error('nome')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sobrenome" class="form-label">Segundo Nome:</label>
                                <input type="text" class="form-control  @error('sobrenome') is-invalid @enderror"
                                    id="sobrenome" name="sobrenome" placeholder="Santos">
                                @error('sobrenome')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cpf" class="form-label">CPF:</label>
                                <input type="text" class="form-control  @error('cpf') is-invalid @enderror"
                                    id="cpf" name="cpf" placeholder=" 123.456.789-00">
                                @error('cpf')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="data_nascimento" class="form-label">Aniversário:</label>
                                <input type="date" class="form-control  @error('data_nascimento') is-invalid @enderror"
                                    id="data_nascimento" name="data_nascimento">
                                @error('data_nascimento')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="genero" class="form-label">Seu gênero</label>
                                <select class="form-select" id="genero" name="genero">
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div id="vendedorFields" style="display: none">
                        <div class="row mt-2">
                            <div class="col-md-6 mb-3">
                                <label for="cnpj" class="form-label">CNPJ:</label>
                                <input type="text" class="form-control  @error('cnpj') is-invalid @enderror"
                                    id="cnpj" name="cnpj" placeholder=" 12.345.678/0001-00">
                                @error('cnpj')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nomeEmpresarial" class="form-label">Nome da Empresa:</label>
                                <input type="text" class="form-control  @error('nomeEmpresarial') is-invalid @enderror"
                                    id="nomeEmpresarial" name="nomeEmpresarial" placeholder="XYCompany">
                                @error('nomeEmpresarial')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Contato do Usuário -->
            <h2 class="mt-4 text-center">Contato do Usuário</h2>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="gabriel@santos.com.br">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control  @error('telefone') is-invalid @enderror" id="telefone"
                        name="telefone" placeholder="55 (19) 9999-9999">
                    @error('telefone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password"
                        name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="confirmacao_senha" class="form-label">Confirmar Senha:</label>
                    <input type="password" class="form-control  @error('confirmacao_senha') is-invalid @enderror"
                        id="confirmacao_senha" name="confirmacao_senha">
                    @error('confirmacao_senha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Dados do Endereço -->
            <h2 class="mt-4 text-center">Dados do Endereço</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" class="form-control  @error('cep') is-invalid @enderror" id="cep"
                        name="cep" placeholder=" 13025-085">
                    @error('cep')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control  @error('bairro') is-invalid @enderror"
                        id="bairro" name="bairro" placeholder="Cambuí">
                    @error('bairro')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control  @error('estado') is-invalid @enderror" id="estado"
                        name="estado" placeholder="São Paulo">
                    @error('estado')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control  @error('cidade') is-invalid @enderror" id="cidade"
                        name="cidade" placeholder="Campinas">
                    @error('cidade')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input type="text" class="form-control  @error('endereco') is-invalid @enderror" id="endereco"
                        name="endereco" placeholder="Campinas">
                    @error('endereco')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="logradouro" class="form-label">Número da Residência:</label>
                    <input type="text" class="form-control  @error('logradouro') is-invalid @enderror" id="logradouro"
                        name="logradouro" placeholder="12">
                    @error('logradouro')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showFields(document.getElementById('tipoUsuario').value);
                });

                function showFields(tipoUsuario) {
                    if (tipoUsuario === 'cliente') {
                        document.getElementById('clienteFields').style.display = 'block';
                        document.getElementById('vendedorFields').style.display = 'none';
                    } else if (tipoUsuario === 'vendedor') {
                        document.getElementById('clienteFields').style.display = 'none';
                        document.getElementById('vendedorFields').style.display = 'block';
                    } else {
                        document.getElementById('clienteFields').style.display = 'none';
                        document.getElementById('vendedorFields').style.display = 'none';
                    }
                }
            </script>

            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary mt-4">Enviar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
