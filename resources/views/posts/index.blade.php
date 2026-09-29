@extends('layouts.app')

@section('title', $q ? "Cari: {$q} - Infokan Blog" : 'Blog - Infokan Blog')

@section('content')
<section class="mx-auto max-w-6xl px-6 py-14">
    <h1 class="text-3xl font-extrabold">Blog</h1>
    <div class="mt-6 max-w-xl"><x-search-form :q="$q" /></div>
    @if ($q)
        <p class="mt-4 text-sm text-slate-500">Hasil untuk "{{ $q }}": {{ $posts->total() }} artikel</p>
    @endif
    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <p class="text-slate-500">Belum ada artikel.</p>
        @endforelse
    </div>
    <div class="mt-10">{{ $posts->links() }}</div>
</section>
@endsection
