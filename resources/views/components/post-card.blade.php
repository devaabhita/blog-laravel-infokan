@props(['post'])
@php
    $tone = ['beginner' => 'green', 'intermediate' => 'amber', 'advanced' => 'red'][$post->level] ?? 'green';
    $isImg = \Illuminate\Support\Str::startsWith((string) $post->thumbnail, ['http', '/']);
@endphp
<article class="flex flex-col overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
    <a href="{{ route('posts.show', $post) }}" class="grid h-48 place-items-center">
        @if ($isImg)
            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="h-full w-full object-cover">
        @else
            <span class="text-5xl">{{ $post->thumbnail ?: '📝' }}</span>
        @endif
    </a>
    <div class="flex flex-1 flex-col p-5">
        <div class="flex flex-wrap gap-2">
            @foreach ($post->categories as $c)
                <x-badge>{{ $c->name }}</x-badge>
            @endforeach
            <x-badge :tone="$tone">{{ $post->levelLabel() }}</x-badge>
        </div>
        <p class="mt-3 text-xs text-slate-500 dark:text-slate-400">
            ⏱ {{ $post->read_time }} min read · {{ $post->published_at?->translatedFormat('d M Y') }}
        </p>
        <h3 class="mt-2 font-bold"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $post->excerpt }}</p>
        <a href="{{ route('posts.show', $post) }}" class="mt-auto pt-4 text-sm font-semibold text-brand-600 dark:text-teal-300">Baca Selengkapnya →</a>
    </div>
</article>
