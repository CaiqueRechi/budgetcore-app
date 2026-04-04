@csrf

<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
    <div>
        <label class="block text-sm font-medium text-gray-700">Conta</label>
        <select name="cash_account_id" class="mt-1 w-full rounded-lg border-gray-300">
            @foreach($cashAccounts as $account)
                <option value="{{ $account->id }}"
                    @selected(old('cash_account_id', $cashMovement->cash_account_id ?? '') == $account->id)>
                    {{ $account->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tipo</label>
        <select name="type" class="mt-1 w-full rounded-lg border-gray-300">
            @foreach($types as $type)
                <option value="{{ $type }}"
                    @selected(old('type', $cashMovement->type ?? '') === $type)>
                    {{ $type }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Valor</label>
        <input type="number" step="0.01" name="amount"
               value="{{ old('amount', $cashMovement->amount ?? '') }}"
               class="mt-1 w-full rounded-lg border-gray-300">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Data</label>
        <input type="date" name="movement_date"
               value="{{ old('movement_date', isset($cashMovement) ? $cashMovement->movement_date->format('Y-m-d') : now()->format('Y-m-d')) }}"
               class="mt-1 w-full rounded-lg border-gray-300">
    </div>
</div>

<div class="mt-6">
    <label class="block text-sm font-medium text-gray-700">Descrição</label>
    <input type="text" name="description"
           value="{{ old('description', $cashMovement->description ?? '') }}"
           class="mt-1 w-full rounded-lg border-gray-300">
</div>

<div class="mt-6">
    <label class="block text-sm font-medium text-gray-700">Observações</label>
    <textarea name="notes" rows="4"
              class="mt-1 w-full rounded-lg border-gray-300">{{ old('notes', $cashMovement->notes ?? '') }}</textarea>
</div>

<div class="mt-6 flex gap-3">
    <button type="submit" class="rounded-lg bg-gray-900 px-4 py-2 text-sm text-white">
        Salvar
    </button>

    <a href="{{ route('cash-movements.index') }}"
       class="rounded-lg border border-gray-300 px-4 py-2 text-sm">
        Cancelar
    </a>
</div>
