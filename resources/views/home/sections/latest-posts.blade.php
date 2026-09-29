<section class="mx-auto max-w-6xl px-6 py-14" data-feed data-url="{{ route('posts.feed') }}">
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-xl font-bold">Artikel Terbaru</h2>
        <div class="flex rounded-lg border border-slate-200 bg-white p-1 text-sm font-medium dark:border-slate-700 dark:bg-slate-800">
            <button type="button" data-tab="terbaru" class="rounded-md bg-slate-900 px-4 py-1.5 text-white dark:bg-brand-600">Terbaru</button>
            <button type="button" data-tab="popular" class="rounded-md px-4 py-1.5">Popular</button>
        </div>
    </div>
    <div data-feed-grid class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
    <div class="mt-10 text-center">
        <button type="button" data-feed-more class="rounded-lg bg-brand-600 px-8 py-3 font-semibold text-white hover:bg-brand-700 disabled:opacity-60 {{ $hasMore ? '' : 'hidden' }}">
            Muat Lebih Banyak Artikel ↻
        </button>
    </div>
</section>
