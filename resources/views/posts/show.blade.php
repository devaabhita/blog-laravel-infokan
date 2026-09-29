@extends('layouts.app')

@section('title', $post->title . ' - Infokan Blog')

@section('content')
<article class="mx-auto max-w-3xl px-6 py-14">
    <div class="flex flex-wrap gap-2">
        @foreach ($post->categories as $c)
            <a href="{{ route('categories.show', $c) }}"><x-badge>{{ $c->name }}</x-badge></a>
        @endforeach
        <x-badge tone="green">{{ $post->levelLabel() }}</x-badge>
    </div>
    <h1 class="mt-4 text-4xl font-extrabold leading-tight">{{ $post->title }}</h1>
    <p class="mt-3 text-sm text-slate-500 dark:text-slate-400">
        {{ $post->user->name }} · {{ $post->published_at->translatedFormat('d M Y') }} · ⏱ {{ $post->read_time }} min read · {{ number_format($post->views) }} dilihat
    </p>
    <div class="mt-8 space-y-5 text-lg leading-8">{!! nl2br(e($post->content)) !!}</div>
</article>

@if ($related->isNotEmpty())
<section class="mx-auto max-w-6xl px-6 pb-14">
    <h2 class="mb-5 text-xl font-bold">Artikel Terkait</h2>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($related as $r)
            <x-post-card :post="$r" />
        @endforeach
    </div>
</section>
@endif
@endsection
