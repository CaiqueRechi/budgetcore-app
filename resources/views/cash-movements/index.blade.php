<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Movimentações</h2>

            <a href="{{ route('cash-movements.create') }}"
               class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white">
                Nova movimentação
            </a>
        </div>
    </x-slot>

    <div class="overflow-hidden rounded-xl bg-white shadow-sm border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Conta</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Tipo</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Valor</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Data</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Descrição</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($cashMovements as $movement)
                    <tr>
                        <td class="px-4 py-3">{{ $movement->cashAccount->name }}</td>
                        <td class="px-4 py-3">{{ $movement->type }}</td>
                        <td class="px-4 py-3">R$ {{ number_format($movement->amount, 2, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $movement->movement_date->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ $movement->description }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">
                            Nenhuma movimentação cadastrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $cashMovements->links() }}
    </div>
</x-app-layout>
