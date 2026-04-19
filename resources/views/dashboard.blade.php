@extends('layouts.app')

@php
    $title = 'Dashboard - BudgetCore';
    $headerTitle = 'Dashboard';
    $headerSubtitle = 'Uma visão clara das suas finanças.';
@endphp

@section('content')
    <div class="space-y-6">
        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card
                title="Saldo total"
                :value="'R$ ' . number_format($totalBalance ?? 0, 2, ',', '.')"
                hint="Soma das contas disponíveis"
                icon="💰"
            />

            <x-stat-card
                title="Entradas do mês"
                :value="'R$ ' . number_format($monthlyIncome ?? 0, 2, ',', '.')"
                hint="Receitas registradas"
                icon="📈"
            />

            <x-stat-card
                title="Saídas do mês"
                :value="'R$ ' . number_format($monthlyExpenses ?? 0, 2, ',', '.')"
                hint="Despesas registradas"
                icon="📉"
            />

            <x-stat-card
                title="Contas em aberto"
                :value="$pendingPayablesCount ?? 0"
                hint="Pagamentos pendentes"
                icon="🧾"
            />
        </section>

        <section class="grid gap-6 xl:grid-cols-[1.4fr_1fr]">
            <div class="app-card p-6">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold">Resumo operacional</h2>
                        <p class="text-sm app-muted">Panorama rápido da saúde financeira.</p>
                    </div>

                    <span class="badge-success">Sistema ativo</span>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div class="app-card-soft p-4">
                        <p class="text-sm font-medium app-muted">Clientes cadastrados</p>
                        <p class="mt-2 text-2xl font-bold">{{ $clientsCount ?? 0 }}</p>
                    </div>

                    <div class="app-card-soft p-4">
                        <p class="text-sm font-medium app-muted">Fornecedores cadastrados</p>
                        <p class="mt-2 text-2xl font-bold">{{ $suppliersCount ?? 0 }}</p>
                    </div>

                    <div class="app-card-soft p-4">
                        <p class="text-sm font-medium app-muted">Contas financeiras</p>
                        <p class="mt-2 text-2xl font-bold">{{ $accountsCount ?? 0 }}</p>
                    </div>

                    <div class="app-card-soft p-4">
                        <p class="text-sm font-medium app-muted">Movimentações registradas</p>
                        <p class="mt-2 text-2xl font-bold">{{ $cashFlowsCount ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="app-card p-6">
                <div class="mb-5">
                    <h2 class="text-lg font-semibold">Próximos pagamentos</h2>
                    <p class="text-sm app-muted">Itens que merecem atenção.</p>
                </div>

                <div class="space-y-3">
                    @forelse(($upcomingPayables ?? []) as $payable)
                        <div class="app-card-soft p-4">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="font-semibold">{{ $payable->description }}</p>
                                    <p class="mt-1 text-sm app-muted">
                                        Vencimento: {{ \Carbon\Carbon::parse($payable->due_date)->format('d/m/Y') }}
                                    </p>
                                </div>

                                <div class="text-right">
                                    <p class="font-semibold">
                                        R$ {{ number_format($payable->amount, 2, ',', '.') }}
                                    </p>

                                    @if($payable->status === 'paid')
                                        <span class="badge-success">Pago</span>
                                    @elseif($payable->status === 'pending')
                                        <span class="badge-warning">Pendente</span>
                                    @else
                                        <span class="badge-danger">{{ ucfirst($payable->status) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="app-card-soft p-4">
                            <p class="text-sm app-muted">Nenhuma conta próxima do vencimento.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
