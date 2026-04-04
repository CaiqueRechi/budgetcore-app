@csrf

<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nome</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $client->name ?? '') }}"
            class="mt-1 w-full rounded-lg border-gray-300"
            required
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">CPF/CNPJ</label>
        <input
            type="text"
            name="document"
            value="{{ old('document', $client->document ?? '') }}"
            class="mt-1 w-full rounded-lg border-gray-300"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">E-mail</label>
        <input
            type="email"
            name="email"
            value="{{ old('email', $client->email ?? '') }}"
            class="mt-1 w-full rounded-lg border-gray-300"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Telefone</label>
        <input
            type="text"
            name="phone"
            value="{{ old('phone', $client->phone ?? '') }}"
            class="mt-1 w-full rounded-lg border-gray-300"
        >
    </div>
</div>

<div class="mt-6">
    <label class="block text-sm font-medium text-gray-700">Endereço</label>
    <input
        type="text"
        name="address"
        value="{{ old('address', $client->address ?? '') }}"
        class="mt-1 w-full rounded-lg border-gray-300"
    >
</div>

<div class="mt-6">
    <label class="block text-sm font-medium text-gray-700">Observações</label>
    <textarea
        name="notes"
        rows="4"
        class="mt-1 w-full rounded-lg border-gray-300"
    >{{ old('notes', $client->notes ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="inline-flex items-center gap-2">
        <input
            type="checkbox"
            name="is_active"
            value="1"
            class="rounded border-gray-300"
            @checked(old('is_active', $client->is_active ?? true))
        >
        <span class="text-sm text-gray-700">Cliente ativo</span>
    </label>
</div>

<div class="mt-6 flex gap-3">
    <button type="submit" class="rounded-lg bg-gray-900 px-4 py-2 text-sm text-white">
        Salvar
    </button>

    <a href="{{ route('clients.index') }}"
       class="rounded-lg border border-gray-300 px-4 py-2 text-sm">
        Cancelar
    </a>
</div>
