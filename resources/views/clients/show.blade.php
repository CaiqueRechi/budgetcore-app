<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Detalhes do cliente</h2>
    </x-slot>

    <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-200 space-y-4">
        <p><strong>Nome:</strong> {{ $client->name }}</p>
        <p><strong>Documento:</strong> {{ $client->document ?: '-' }}</p>
        <p><strong>E-mail:</strong> {{ $client->email ?: '-' }}</p>
        <p><strong>Telefone:</strong> {{ $client->phone ?: '-' }}</p>
        <p><strong>Endereço:</strong> {{ $client->address ?: '-' }}</p>
        <p><strong>Status:</strong> {{ $client->is_active ? 'Ativo' : 'Inativo' }}</p>
        <p><strong>Observações:</strong> {{ $client->notes ?: '-' }}</p>
    </div>
</x-app-layout>
