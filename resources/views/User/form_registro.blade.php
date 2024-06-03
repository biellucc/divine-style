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
                    <label for="userType" class="form-label">Escolha o tipo de usuário:</label>
                    <select class="form-select" id="userType" name="userType" onchange="showFields(this.value)">
                        <option value="customer">Cliente</option>
                        <option value="vendor">Vendedor</option>
                    </select>
                </div>

                <div class="col-mb-3">
                    <div id="customerFields" style="display: none">

                        <div class="row mt-2">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">Primeiro Nome:</label>
                                <input type="text" class="form-control  @error('firstName') is-invalid @enderror"
                                    id="firstName" name="firstName" placeholder="Gabriel">
                                @error('firstName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Segundo Nome:</label>
                                <input type="text" class="form-control  @error('lastName') is-invalid @enderror"
                                    id="lastName" name="lastName" placeholder="Santos">
                                @error('lastName')
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
                                <label for="birthday" class="form-label">Aniversário:</label>
                                <input type="date" class="form-control  @error('birthday') is-invalid @enderror"
                                    id="birthday" name="birthday">
                                @error('birthday')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gender" class="form-label">Seu gênero</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div id="vendorFields" style="display: none">
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
                                <label for="nameBusines" class="form-label">Nome da Empresa:</label>
                                <input type="text" class="form-control  @error('nameBusiness') is-invalid @enderror"
                                    id="nameBusiness" name="nameBusiness" placeholder="XYCompany">
                                @error('nameBusiness')
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
                    <label for="phone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control  @error('phone') is-invalid @enderror" id="phone"
                        name="phone" placeholder="55 (19) 9999-9999">
                    @error('phone')
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
                    <label for="password_confirmation" class="form-label">Confirmar Senha:</label>
                    <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
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
                    <label for="neighborhood" class="form-label">Bairro:</label>
                    <input type="text" class="form-control  @error('neighborhood') is-invalid @enderror"
                        id="neighborhood" name="neighborhood" placeholder="Cambuí">
                    @error('neighborhood')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="state" class="form-label">Estado:</label>
                    <input type="text" class="form-control  @error('state') is-invalid @enderror" id="state"
                        name="state" placeholder="São Paulo">
                    @error('state')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">Cidade:</label>
                    <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city"
                        name="city" placeholder="Campinas">
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="n_house" class="form-label">Número da Residência:</label>
                    <input type="text" class="form-control  @error('n_house') is-invalid @enderror" id="n_house"
                        name="n_house" placeholder="12">
                    @error('n_house')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="complement" class="form-label">Complemento (Opcional):</label>
                    <input type="text" class="form-control  @error('complement') is-invalid @enderror"
                        id="complement" name="complement">
                    @error('complement')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showFields(document.getElementById('userType').value);
                });

                function showFields(userType) {
                    if (userType === 'customer') {
                        document.getElementById('customerFields').style.display = 'block';
                        document.getElementById('vendorFields').style.display = 'none';
                    } else if (userType === 'vendor') {
                        document.getElementById('customerFields').style.display = 'none';
                        document.getElementById('vendorFields').style.display = 'block';
                    } else {
                        document.getElementById('customerFields').style.display = 'none';
                        document.getElementById('vendorFields').style.display = 'none';
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
