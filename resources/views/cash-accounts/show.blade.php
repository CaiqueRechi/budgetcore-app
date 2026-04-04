<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Detalhes da conta</h2>
    </x-slot>

    <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-200 space-y-4">
        <div>
            <p class="text-sm text-gray-500">Nome</p>
            <p class="text-base font-medium text-gray-900">{{ $cashAccount->name }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Tipo</p>
            <p class="text-base text-gray-900">{{ $cashAccount->type }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Saldo atual</p>
            <p class="text-base text-gray-900">R$ {{ number_format($cashAccount->balance, 2, ',', '.') }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Status</p>
            <p class="text-base text-gray-900">{{ $cashAccount->is_active ? 'Ativa' : 'Inativa' }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Descrição</p>
            <p class="text-base text-gray-900">{{ $cashAccount->description ?: 'Sem descrição.' }}</p>
        </div>

        <div class="pt-4 flex gap-3">
            <a href="{{ route('cash-accounts.edit', $cashAccount) }}"
               class="rounded-lg bg-amber-500 px-4 py-2 text-sm font-medium text-white hover:bg-amber-600">
                Editar
            </a>

            <a href="{{ route('cash-accounts.index') }}"
               class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                Voltar
            </a>
        </div>
    </div>
</x-app-layout>
