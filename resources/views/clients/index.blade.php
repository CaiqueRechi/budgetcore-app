<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Clientes</h2>

            <a href="{{ route('clients.create') }}"
               class="rounded-lg bg-gray-900 px-4 py-2 text-sm text-white">
                Novo cliente
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
                @forelse($clients as $client)
                    <tr>
                        <td class="px-4 py-3">{{ $client->name }}</td>
                        <td class="px-4 py-3">{{ $client->document ?: '-' }}</td>
                        <td class="px-4 py-3">{{ $client->email ?: '-' }}</td>
                        <td class="px-4 py-3">{{ $client->phone ?: '-' }}</td>
                        <td class="px-4 py-3">
                            {{ $client->is_active ? 'Ativo' : 'Inativo' }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('clients.show', $client) }}">Ver</a>
                                <a href="{{ route('clients.edit', $client) }}">Editar</a>
                                <form method="POST" action="{{ route('clients.destroy', $client) }}">
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
                            Nenhum cliente cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $clients->links() }}
    </div>
</x-app-layout>
