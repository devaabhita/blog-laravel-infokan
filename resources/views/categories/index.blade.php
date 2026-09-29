@extends('layouts.app')

@section('title', 'Kategori - Infokan Blog')

@section('content')
<section class="mx-auto max-w-6xl px-6 py-14">
    <h1 class="text-3xl font-extrabold">Semua Kategori</h1>
    <div class="mt-8 flex flex-wrap gap-5">
        @foreach ($categories as $category)
            <x-category-card :category="$category" />
        @endforeach
    </div>
</section>
@endsection
