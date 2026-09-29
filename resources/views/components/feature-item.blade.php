@props(['icon', 'title', 'subtitle'])
<div class="flex items-center gap-3">
    <span class="grid h-11 w-11 place-items-center rounded-full bg-brand-50 dark:bg-brand-600/20">{{ $icon }}</span>
    <div>
        <p class="font-semibold">{{ $title }}</p>
        <p class="text-sm text-slate-500 dark:text-slate-400">{{ $subtitle }}</p>
    </div>
</div>
