<section class="mx-auto max-w-6xl border-b border-slate-200 px-6 pb-14 dark:border-slate-700">
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-xl font-bold">Kategori Populer</h2>
        <a href="{{ route('categories.index') }}" class="text-sm font-medium text-brand-600 dark:text-teal-300">Lihat semua kategori →</a>
    </div>
    <div class="flex flex-wrap gap-5">
        @foreach ($categories as $category)
            <x-category-card :category="$category" />
        @endforeach
    </div>
</section>
