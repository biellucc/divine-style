@extends('Layouts.layout_main')
@section('title', 'Index')
@section('conteudo')

<div class="d-flex mt-4">
    @foreach ($roupas as $roupa)
    <span>roupa {{ $roupa->nome }}</span>
    <a href="{{ route('site.produto', ['id' => $roupa->id]) }}" class="btn btn-success">{{ __('Saber mais') }}</a>
@endforeach
</div>

@endsection
