<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Fornecedores</h2>

            <a href="{{ route('suppliers.create') }}"
               class="rounded-lg bg-gray-900 px-4 py-2 text-sm text-white">
                Novo fornecedor
            </a>
        </div>
    </x-slot>

    <div class="overflow-hidden rounded-xl bg-white shadow-sm border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Nome</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Documento</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">E-mail</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Telefone</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Status</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($suppliers as $supplier)
                    <tr>
                        <td class="px-4 py-3">{{ $supplier->name }}</td>
                        <td class="px-4 py-3">{{ $supplier->document ?: '-' }}</td>
                        <td class="px-4 py-3">{{ $supplier->email ?: '-' }}</td>
                        <td class="px-4 py-3">{{ $supplier->phone ?: '-' }}</td>
                        <td class="px-4 py-3">
                            {{ $supplier->is_active ? 'Ativo' : 'Inativo' }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('suppliers.show', $supplier) }}">Ver</a>
                                <a href="{{ route('suppliers.edit', $supplier) }}">Editar</a>
                                <form method="POST" action="{{ route('suppliers.destroy', $supplier) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-sm text-gray-500">
                            Nenhum fornecedor cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $suppliers->links() }}
    </div>
</x-app-layout>
