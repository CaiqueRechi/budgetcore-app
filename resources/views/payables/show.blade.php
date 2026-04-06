<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-gray-800">Detalhes da conta a pagar</h2>
    </x-slot>

    <div class="max-w-3xl">
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200 space-y-4">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Descrição</h3>
                <p class="mt-1 text-gray-900">{{ $payable->description }}</p>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Fornecedor</h3>
                    <p class="mt-1 text-gray-900">{{ $payable->supplier->name }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Conta/Caixa</h3>
                    <p class="mt-1 text-gray-900">{{ $payable->cashAccount->name ?? 'Não informado' }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Valor</h3>
                    <p class="mt-1 text-gray-900">R$ {{ number_format((float) $payable->amount, 2, ',', '.') }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Vencimento</h3>
                    <p class="mt-1 text-gray-900">{{ $payable->due_date->format('d/m/Y') }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Status</h3>
                    <p class="mt-1 text-gray-900">{{ $payable->status->label() }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500">Pago em</h3>
                    <p class="mt-1 text-gray-900">{{ $payable->paid_at?->format('d/m/Y H:i') ?? 'Ainda não pago' }}</p>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-500">Observações</h3>
                <p class="mt-1 text-gray-900">{{ $payable->notes ?: 'Sem observações.' }}</p>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <a
                    href="{{ route('payables.index') }}"
                    class="rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"
                >
                    Voltar
                </a>

                <a
                    href="{{ route('payables.edit', $payable) }}"
                    class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800"
                >
                    Editar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
