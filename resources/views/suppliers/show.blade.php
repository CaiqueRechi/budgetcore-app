<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Detalhes do fornecedor</h2>
    </x-slot>

    <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-200 space-y-4">
        <p><strong>Nome:</strong> {{ $supplier->name }}</p>
        <p><strong>Documento:</strong> {{ $supplier->document ?: '-' }}</p>
        <p><strong>E-mail:</strong> {{ $supplier->email ?: '-' }}</p>
        <p><strong>Telefone:</strong> {{ $supplier->phone ?: '-' }}</p>
        <p><strong>Endereço:</strong> {{ $supplier->address ?: '-' }}</p>
        <p><strong>Status:</strong> {{ $supplier->is_active ? 'Ativo' : 'Inativo' }}</p>
        <p><strong>Observações:</strong> {{ $supplier->notes ?: '-' }}</p>
    </div>
</x-app-layout>
