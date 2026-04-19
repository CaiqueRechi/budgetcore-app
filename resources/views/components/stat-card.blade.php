@props([
    'title',
    'value',
    'hint' => null,
    'icon' => '📊',
])

<div class="app-card p-5">
    <div class="flex items-start justify-between gap-4">
        <div>
            <p class="stat-label">{{ $title }}</p>
            <p class="mt-2 stat-value">{{ $value }}</p>

            @if ($hint)
                <p class="mt-2 text-sm app-muted">{{ $hint }}</p>
            @endif
        </div>

        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand-50 text-xl dark:bg-slate-800">
            {{ $icon }}
        </div>
    </div>
</div>
