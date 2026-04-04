<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Novo cliente</h2>
    </x-slot>

    <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-200">
        <form action="{{ route('clients.store') }}" method="POST">
            @include('clients._form')
        </form>
    </div>
</x-app-layout>
