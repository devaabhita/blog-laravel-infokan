<footer class="bg-slate-900 text-slate-400 dark:bg-slate-950">
    <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-[2fr_1fr_1fr_2fr]">
        <div>
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-white">
                <span class="grid h-5 w-5 place-items-center rounded bg-slate-700 text-xs">+</span> infokan blog
            </a>
            <p class="mt-4 max-w-xs text-sm leading-6">Blog teknologi dengan penjelasan sederhana untuk kamu yang ingin belajar tech dari nol.</p>
            <div class="mt-5 flex gap-2 text-sm text-slate-300">
                @foreach (['⌘', '𝕏', 'in', '▶'] as $s)
                    <a href="#" class="grid h-9 w-9 place-items-center rounded-md bg-slate-800 hover:bg-slate-700">{{ $s }}</a>
                @endforeach
            </div>
        </div>
        <div>
            <h4 class="mb-4 text-sm font-semibold text-white">Navigasi</h4>
            <ul class="space-y-3 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                <li><a href="{{ route('posts.index') }}" class="hover:text-white">Blog</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-white">Tentang</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white">Kontak</a></li>
            </ul>
        </div>
        <div>
            <h4 class="mb-4 text-sm font-semibold text-white">Kategori</h4>
            <ul class="space-y-3 text-sm">
                @foreach ($footerCategories as $c)
                    <li><a href="{{ route('categories.show', $c) }}" class="hover:text-white">{{ $c->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <h4 class="mb-4 text-sm font-semibold text-white">Newsletter</h4>
            <p class="mb-4 text-sm">Dapatkan artikel terbaru langsung di email kamu.</p>
            <x-newsletter-form />
        </div>
    </div>
</footer>
