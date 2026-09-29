<form action="{{ route('newsletter.store') }}" method="POST" class="flex gap-2">
    @csrf
    <input type="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email kamu..."
           class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-sm text-white placeholder-slate-500">
    <button class="rounded-lg bg-brand-600 px-4 text-sm font-semibold text-white hover:bg-brand-700">Subscribe</button>
</form>
@if (session('newsletter_status'))
    <p class="mt-2 text-sm text-teal-300">{{ session('newsletter_status') }}</p>
@endif
@error('email')
    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
@enderror
