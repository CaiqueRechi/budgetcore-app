<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Novo fornecedor</h2>
    </x-slot>

    <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-200">
        <form action="{{ route('suppliers.store') }}" method="POST">
            @include('suppliers._form')
        </form>
    </div>
</x-app-layout>
