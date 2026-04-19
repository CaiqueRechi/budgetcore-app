<header class="app-topbar">
    <div class="flex items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <div>
            <h1 class="text-xl font-bold tracking-tight">{{ $headerTitle ?? 'Visão geral' }}</h1>
            <p class="mt-1 text-sm app-muted">{{ $headerSubtitle ?? 'Acompanhe seus dados com clareza.' }}</p>
        </div>

        <div class="flex items-center gap-3">
            <button
                type="button"
                data-theme-toggle
                class="app-btn-secondary"
            >
                Alternar tema
            </button>

            <div class="hidden sm:block text-right">
                <p class="text-sm font-semibold">{{ auth()->user()->name ?? 'Usuário' }}</p>
                <p class="text-xs app-muted">{{ auth()->user()->email ?? 'user@email.com' }}</p>
            </div>
        </div>
    </div>
</header>
