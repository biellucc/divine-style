@extends('Layouts.layout_main')
@section('title', 'Produto')
@section('conteudo')

<div class="container">
    <div class="row">

        <div class="col-8">i</div>
        <div class="col-4">
            <h4>{{ $produto->tipo }}</h4>
        </div>

    </div>

    <div class="d-grade">
        <h5>{{ __('Comentários') }}</h5>
    </div>
</div>

@endsection
