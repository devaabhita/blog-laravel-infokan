@props(['q' => ''])
<form action="{{ route('posts.index') }}" method="GET" class="flex gap-3">
    <input type="search" name="q" value="{{ $q }}" placeholder="Cari artikel..."
           class="w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-slate-900 focus:outline-brand-600 dark:border-slate-700 dark:bg-slate-800 dark:text-white">
    <button class="rounded-lg bg-brand-600 px-7 font-semibold text-white hover:bg-brand-700">Cari</button>
</form>
