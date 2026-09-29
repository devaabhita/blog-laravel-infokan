@extends('layouts.app')

@section('title', 'Infokan Blog - Belajar Tech dari Nol')

@section('content')
    @include('home.sections.hero')
    @include('home.sections.popular-categories')
    @include('home.sections.latest-posts')
@endsection
