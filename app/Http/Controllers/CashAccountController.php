<?php

namespace App\Http\Controllers;

use App\Models\CashAccount;
use Illuminate\Http\Request;

class CashAccountController extends Controller
{
    public function index(Request $request)
    {
        $cashAccounts = $request->user()
            ->cashAccounts()
            ->latest()
            ->paginate(10);

        return view('cash-accounts.index', compact('cashAccounts'));
    }

    public function create()
    {
        $types = CashAccount::types();

        return view('cash-accounts.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:' . implode(',', CashAccount::types())],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $request->user()->cashAccounts()->create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'description' => $validated['description'] ?? null,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()
            ->route('cash-accounts.index')
            ->with('success', 'Conta criada com sucesso.');
    }

    public function show(CashAccount $cashAccount)
    {
        $this->authorizeOwner($cashAccount);

        return view('cash-accounts.show', compact('cashAccount'));
    }

    public function edit(CashAccount $cashAccount)
    {
        $this->authorizeOwner($cashAccount);

        $types = CashAccount::types();

        return view('cash-accounts.edit', compact('cashAccount', 'types'));
    }

    public function update(Request $request, CashAccount $cashAccount)
    {
        $this->authorizeOwner($cashAccount);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:' . implode(',', CashAccount::types())],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $cashAccount->update([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'description' => $validated['description'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('cash-accounts.index')
            ->with('success', 'Conta atualizada com sucesso.');
    }

    public function destroy(CashAccount $cashAccount)
    {
        $this->authorizeOwner($cashAccount);

        $cashAccount->delete();

        return redirect()
            ->route('cash-accounts.index')
            ->with('success', 'Conta removida com sucesso.');
    }

    private function authorizeOwner(CashAccount $cashAccount): void
    {
        abort_if($cashAccount->user_id !== auth()->id(), 403);
    }
}
