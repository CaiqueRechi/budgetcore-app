<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Contas/Caixas</h2>

            <a href="{{ route('cash-accounts.create') }}"
               class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800">
                Nova conta
            </a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-xl bg-white shadow-sm border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">Nome</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">Tipo</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">Saldo</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">Status</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase text-gray-500">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($cashAccounts as $cashAccount)
                    <tr>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $cashAccount->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $cashAccount->type }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">R$ {{ number_format($cashAccount->balance, 2, ',', '.') }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if($cashAccount->is_active)
                                <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700">Ativa</span>
                            @else
                                <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700">Inativa</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('cash-accounts.show', $cashAccount) }}"
                                   class="text-sm text-blue-600 hover:text-blue-800">
                                    Ver
                                </a>

                                <a href="{{ route('cash-accounts.edit', $cashAccount) }}"
                                   class="text-sm text-amber-600 hover:text-amber-800">
                                    Editar
                                </a>

                                <form action="{{ route('cash-accounts.destroy', $cashAccount) }}" method="POST" onsubmit="return confirm('Deseja remover esta conta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:text-red-800">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">
                            Nenhuma conta cadastrada ainda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $cashAccounts->links() }}
    </div>
</x-app-layout>
