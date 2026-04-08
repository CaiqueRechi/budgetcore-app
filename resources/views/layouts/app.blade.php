<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'BudgetCore') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    @php
        $menuClass = fn ($route) =>
            request()->routeIs($route)
                ? 'block rounded-lg px-3 py-2 text-sm bg-gray-900 text-white'
                : 'block rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100';
    @endphp

    <div class="min-h-screen flex">
        <aside class="hidden md:flex md:w-64 md:flex-col bg-white border-r border-gray-200">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white font-bold shadow">
                    B
                </div>

                <div>
                    <p class="text-sm font-semibold">BUD</p>
                    <p class="text-xs text-slate-500">BudgetCore</p>
                </div>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-6">
                <div>
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Geral</p>
                    <a href="{{ route('dashboard') }}" class="{{ $menuClass('dashboard') }}">
                        Dashboard
                    </a>
                </div>

                <div>
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Financeiro</p>
                    <div class="space-y-1">
                        <a href="{{ route('cash-movements.index') }}" class="{{ $menuClass('cash-movements.*') }}">
                            Movimentações
                        </a>
                        <a href="{{ route('payables.index') }}"
                        class="{{ $menuClass('payables.*') }}">
                            Contas a pagar
                        </a>
                        <a href="#" class="{{ $menuClass('#') }}">
                            Contas a receber
                        </a>
                    </div>
                </div>

                <div>
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Caixa</p>
                    <div class="space-y-1">
                        <a href="{{ route('cash-accounts.index') }}" class="{{ $menuClass('cash-accounts.*') }}">
                            Contas/Caixas
                        </a>
                    </div>
                </div>

                <div>
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Cadastros</p>
                    <div class="space-y-1">
                        <a href="{{ route('clients.index') }}" class="{{ $menuClass('clients.*') }}">
                            Clientes
                        </a>
                        <a href="{{ route('suppliers.index') }}" class="{{ $menuClass('suppliers.*') }}">
                            Fornecedores
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <div>
                    @isset($header)
                        {{ $header }}
                    @else
                        <h2 class="text-lg font-semibold text-gray-800">Painel</h2>
                    @endisset
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">{{ auth()->user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-700">
                            Sair
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-6">
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
