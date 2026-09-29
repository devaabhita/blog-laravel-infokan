@props(['category'])
<a href="{{ route('categories.show', $category) }}"
   class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-5 py-4 shadow-sm transition hover:shadow-md dark:border-slate-700 dark:bg-slate-800">
    <span class="grid h-10 w-10 place-items-center rounded-lg text-lg" style="background: {{ $category->color ?: '#e6f4f1' }}">{{ $category->icon }}</span>
    <span>
        <span class="block font-semibold">{{ $category->name }}</span>
        <span class="text-sm text-slate-500 dark:text-slate-400">{{ $category->posts_count ?? $category->posts()->count() }} artikel</span>
    </span>
</a>
