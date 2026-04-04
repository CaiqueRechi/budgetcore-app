@csrf

<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
    <div>
        <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Nome</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $cashAccount->name ?? '') }}"
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500"
            required
        >
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="type" class="mb-1 block text-sm font-medium text-gray-700">Tipo</label>
        <select
            name="type"
            id="type"
            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500"
            required
        >
            <option value="">Selecione</option>
            @foreach($types as $type)
                <option value="{{ $type }}" @selected(old('type', $cashAccount->type ?? '') === $type)>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        @error('type')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-6">
    <label for="description" class="mb-1 block text-sm font-medium text-gray-700">Descrição</label>
    <textarea
        name="description"
        id="description"
        rows="4"
        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500"
    >{{ old('description', $cashAccount->description ?? '') }}</textarea>
    @error('description')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mt-6">
    <label class="inline-flex items-center gap-2">
        <input
            type="checkbox"
            name="is_active"
            value="1"
            class="rounded border-gray-300 text-gray-900 shadow-sm focus:ring-gray-500"
            @checked(old('is_active', $cashAccount->is_active ?? true))
        >
        <span class="text-sm text-gray-700">Conta ativa</span>
    </label>
</div>

<div class="mt-6 flex items-center gap-3">
    <button type="submit" class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800">
        Salvar
    </button>

    <a href="{{ route('cash-accounts.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
        Cancelar
    </a>
</div>
