@extends('layouts.app')

@section('title', $category->name . ' - Infokan Blog')

@section('content')
<section class="mx-auto max-w-6xl px-6 py-14">
    <h1 class="text-3xl font-extrabold">{{ $category->icon }} {{ $category->name }}</h1>
    @if ($category->description)
        <p class="mt-2 text-slate-500 dark:text-slate-400">{{ $category->description }}</p>
    @endif
    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <p class="text-slate-500">Belum ada artikel di kategori ini.</p>
        @endforelse
    </div>
    <div class="mt-10">{{ $posts->links() }}</div>
</section>
@endsection
