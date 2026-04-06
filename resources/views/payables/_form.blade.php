@php
    $isEdit = isset($payable);
@endphp

<div class="space-y-6">
    <div>
        <label for="supplier_id" class="block text-sm font-medium text-gray-700">Fornecedor</label>
        <select
            name="supplier_id"
            id="supplier_id"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900"
            required
        >
            <option value="">Selecione</option>
            @foreach ($suppliers as $supplier)
                <option
                    value="{{ $supplier->id }}"
                    @selected(old('supplier_id', $payable->supplier_id ?? '') == $supplier->id)
                >
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
        @error('supplier_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="cash_account_id" class="block text-sm font-medium text-gray-700">Conta/Caixa</label>
        <select
            name="cash_account_id"
            id="cash_account_id"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900"
        >
            <option value="">Selecione</option>
            @foreach ($cashAccounts as $cashAccount)
                <option
                    value="{{ $cashAccount->id }}"
                    @selected(old('cash_account_id', $payable->cash_account_id ?? '') == $cashAccount->id)
                >
                    {{ $cashAccount->name }}
                </option>
            @endforeach
        </select>
        @error('cash_account_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
        <input
            type="text"
            name="description"
            id="description"
            value="{{ old('description', $payable->description ?? '') }}"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900"
            required
        >
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Valor</label>
            <input
                type="number"
                step="0.01"
                min="0.01"
                name="amount"
                id="amount"
                value="{{ old('amount', isset($payable) ? number_format((float) $payable->amount, 2, '.', '') : '') }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900"
                required
            >
            @error('amount')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="due_date" class="block text-sm font-medium text-gray-700">Vencimento</label>
            <input
                type="date"
                name="due_date"
                id="due_date"
                value="{{ old('due_date', isset($payable) && $payable->due_date ? $payable->due_date->format('Y-m-d') : '') }}"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900"
                required
            >
            @error('due_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    @if($isEdit)
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select
                name="status"
                id="status"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900"
                required
            >
                <option value="0" @selected((int) old('status', $payable->status->value ?? 0) === 0)>Pendente</option>
                <option value="1" @selected((int) old('status', $payable->status->value ?? 0) === 1)>Pago</option>
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    @endif

    <div>
        <label for="notes" class="block text-sm font-medium text-gray-700">Observações</label>
        <textarea
            name="notes"
            id="notes"
            rows="4"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-900 focus:ring-gray-900"
        >{{ old('notes', $payable->notes ?? '') }}</textarea>
        @error('notes')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
