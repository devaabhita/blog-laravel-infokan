@php $latest = \App\Models\Post::published()->latest('published_at')->first(); @endphp
<header class="bg-slate-900 text-slate-100 dark:bg-slate-950">
    <nav class="mx-auto flex h-[72px] max-w-7xl items-center justify-between px-6">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold">
            <span class="grid h-5 w-5 place-items-center rounded bg-brand-600 text-xs">+</span> infokan blog
        </a>
        <ul class="hidden items-center gap-8 text-sm font-medium md:flex">
            <li><a href="{{ route('home') }}" class="hover:text-white/70">Beranda</a></li>
            <li><a href="{{ route('posts.index') }}" class="hover:text-white/70">Blog</a></li>
            <li><a href="{{ $latest ? route('posts.show', $latest) : route('posts.index') }}" class="hover:text-white/70">Single Post</a></li>
            <li class="relative">
                <details>
                    <summary class="flex cursor-pointer list-none items-center gap-1 hover:text-white/70">Other Pages <span class="text-[10px]">▾</span></summary>
                    <div class="absolute right-0 top-8 z-10 w-40 rounded-lg bg-slate-800 py-2 shadow-lg">
                        <a href="{{ route('categories.index') }}" class="block px-4 py-2 hover:bg-slate-700">Kategori</a>
                        <a href="{{ route('about') }}" class="block px-4 py-2 hover:bg-slate-700">Tentang</a>
                        <a href="{{ route('contact') }}" class="block px-4 py-2 hover:bg-slate-700">Kontak</a>
                    </div>
                </details>
            </li>
        </ul>
        <button id="theme-toggle" type="button" aria-label="Ganti tema" class="text-lg">🌙</button>
    </nav>
</header>
