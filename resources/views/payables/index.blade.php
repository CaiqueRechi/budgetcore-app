<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-800">Contas a pagar</h2>

            <a
                href="{{ route('payables.create') }}"
                class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800"
            >
                Nova conta
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Descrição</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Fornecedor</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Valor</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Vencimento</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Ações</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($payables as $payable)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $payable->description }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $payable->supplier->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">R$ {{ number_format((float) $payable->amount, 2, ',', '.') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $payable->due_date->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if ($payable->isPaid())
                                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                    Pago
                                </span>
                            @elseif ($payable->isOverdue())
                                <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
                                    Vencido
                                </span>
                            @else
                                <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-700">
                                    Pendente
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right text-sm">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('payables.show', $payable) }}" class="text-gray-600 hover:text-gray-900">Ver</a>
                                <a href="{{ route('payables.edit', $payable) }}" class="text-blue-600 hover:text-blue-800">Editar</a>

                                <form method="POST" action="{{ route('payables.destroy', $payable) }}" onsubmit="return confirm('Deseja remover esta conta a pagar?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-6 text-center text-sm text-gray-500">
                            Nenhuma conta a pagar cadastrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $payables->links() }}
    </div>
</x-app-layout>
