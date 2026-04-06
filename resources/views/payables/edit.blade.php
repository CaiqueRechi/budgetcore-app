<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-gray-800">Editar conta a pagar</h2>
    </x-slot>

    <div class="max-w-3xl">
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
            <form method="POST" action="{{ route('payables.update', $payable) }}" class="space-y-6">
                @csrf
                @method('PUT')

                @include('payables._form')

                <div class="flex items-center gap-3">
                    <a
                        href="{{ route('payables.index') }}"
                        class="rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800"
                    >
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
