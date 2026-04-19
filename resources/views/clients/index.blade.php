@extends('layouts.app')

@php
    $title = 'Clientes - BudgetCore';
    $headerTitle = 'Clientes';
    $headerSubtitle = 'Gerencie seus clientes com organização e clareza.';
@endphp

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <form method="GET" class="w-full max-w-md">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar cliente..."
                    class="app-input"
                >
            </form>

            <a href="{{ route('clients.create') }}" class="app-btn-primary">
                Novo cliente
            </a>
        </div>

        <div class="app-card overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y">
                    <thead style="background-color: rgb(var(--surface-soft));">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider app-muted">Nome</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider app-muted">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider app-muted">Telefone</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider app-muted">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse ($clients as $client)
                            <tr class="transition hover:bg-slate-50 dark:hover:bg-slate-800/50">
                                <td class="px-6 py-4 font-medium">{{ $client->name }}</td>
                                <td class="px-6 py-4 text-sm app-muted">{{ $client->email }}</td>
                                <td class="px-6 py-4 text-sm app-muted">{{ $client->phone }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('clients.show', $client) }}" class="app-btn-secondary">Ver</a>
                                        <a href="{{ route('clients.edit', $client) }}" class="app-btn-secondary">Editar</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-sm app-muted">
                                    Nenhum cliente encontrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t px-6 py-4">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
@endsection
