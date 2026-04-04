<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'BudgetCore') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-gray-900">
        <div class="min-h-screen flex">
            <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex md:flex-col">
                <div class="h-16 flex items-center px-6 border-b border-gray-200">
                    <span class="text-xl font-bold">BudgetCore</span>
                </div>

                <nav class="flex-1 px-4 py-6 space-y-6">
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase mb-2">Geral</p>
                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100">
                            Dashboard
                        </a>
                    </div>

                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase mb-2">Financeiro</p>
                        <div class="space-y-1">
                            <a href="#" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Contas a pagar</a>
                            <a href="#" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Contas a receber</a>
                            <a href="#" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Movimentações</a>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase mb-2">Caixa</p>
                        <div class="space-y-1">
                            <a href="#" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Contas/Caixas</a>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase mb-2">Cadastros</p>
                        <div class="space-y-1">
                            <a href="#" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Clientes</a>
                            <a href="#" class="block px-3 py-2 rounded-lg hover:bg-gray-100">Fornecedores</a>
                        </div>
                    </div>
                </nav>
            </aside>

            <div class="flex-1 flex flex-col">
                <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">
                    <div>
                        @isset($header)
                            {{ $header }}
                        @else
                            <h1 class="text-lg font-semibold">Painel</h1>
                        @endisset
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-red-600 hover:text-red-700">
                                Sair
                            </button>
                        </form>
                    </div>
                </header>

                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
