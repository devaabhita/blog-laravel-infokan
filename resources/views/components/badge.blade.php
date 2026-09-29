@props(['tone' => 'teal'])
@php
    $tones = [
        'teal' => 'bg-brand-50 text-brand-700 dark:bg-brand-600/20 dark:text-teal-300',
        'green' => 'bg-green-100 text-green-700 dark:bg-green-500/20 dark:text-green-300',
        'amber' => 'bg-amber-100 text-amber-700 dark:bg-amber-500/20 dark:text-amber-300',
        'red' => 'bg-red-100 text-red-700 dark:bg-red-500/20 dark:text-red-300',
    ];
@endphp
<span {{ $attributes->merge(['class' => 'rounded px-2 py-1 text-xs font-medium ' . ($tones[$tone] ?? $tones['teal'])]) }}>{{ $slot }}</span>
