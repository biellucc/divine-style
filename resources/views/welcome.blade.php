@extends('Layouts.layout_main')
@section('title', 'Index')
@section('conteudo')

@foreach ($roupas as $roupa)
    <span>roupa {{ $roupa->nome }}</span>
    <a href="{{ route('site.produto', ['id' => $roupa->id]) }}" class="btn btn-success">{{ __('Saber mais') }}</a>
@endforeach

@endsection
