@extends('Layouts.layout_main')
@section('title', 'Index')
@section('conteudo')

@if (auth::check())
    <a href="">{{ Auth::user()->email }}</a>
@endif

@endsection
