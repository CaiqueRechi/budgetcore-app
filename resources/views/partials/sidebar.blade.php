<aside class="app-sidebar hidden min-h-screen lg:flex lg:flex-col">
    <div class="flex items-center gap-3 px-6 py-6">
        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand-600 text-lg font-bold text-white shadow-sm">
            B
        </div>

        <div>
            <p class="text-lg font-bold tracking-tight">BudgetCore</p>
            <p class="text-sm app-muted">BUD · Financial Control</p>
        </div>
    </div>

    <nav class="flex-1 space-y-1 px-4">

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'app-nav-link-active' : 'app-nav-link' }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('clients.index') }}"
           class="{{ request()->routeIs('clients.*') ? 'app-nav-link-active' : 'app-nav-link' }}">
            👥 Clientes
        </a>

        <a href="{{ route('suppliers.index') }}"
           class="{{ request()->routeIs('suppliers.*') ? 'app-nav-link-active' : 'app-nav-link' }}">
            🏢 Fornecedores
        </a>

        <a href="{{ route('cash-accounts.index') }}"
           class="{{ request()->routeIs('cash-accounts.*') ? 'app-nav-link-active' : 'app-nav-link' }}">
            💳 Contas
        </a>

        <a href="{{ route('cash-movements.index') }}"
           class="{{ request()->routeIs('cash-movements.*') ? 'app-nav-link-active' : 'app-nav-link' }}">
            💸 Movimentações
        </a>

        <a href="{{ route('payables.index') }}"
           class="{{ request()->routeIs('payables.*') ? 'app-nav-link-active' : 'app-nav-link' }}">
            📅 Contas a pagar
        </a>

    </nav>
</aside>
