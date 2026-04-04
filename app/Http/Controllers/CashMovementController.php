<?php

namespace App\Http\Controllers;

use App\Models\CashAccount;
use App\Models\CashMovement;
use Illuminate\Http\Request;

class CashMovementController extends Controller
{
    public function index(Request $request)
    {
        $cashMovements = $request->user()
            ->cashMovements()
            ->with('cashAccount')
            ->latest('movement_date')
            ->paginate(15);

        return view('cash-movements.index', compact('cashMovements'));
    }

    public function create(Request $request)
    {
        $cashAccounts = $request->user()
            ->cashAccounts()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $types = CashMovement::types();

        return view('cash-movements.create', compact('cashAccounts', 'types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cash_account_id' => ['required', 'exists:cash_accounts,id'],
            'type' => ['required', 'in:' . implode(',', CashMovement::types())],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'description' => ['required', 'string', 'max:255'],
            'movement_date' => ['required', 'date'],
            'notes' => ['nullable', 'string'],
        ]);

        $cashAccount = $request->user()
            ->cashAccounts()
            ->findOrFail($validated['cash_account_id']);

        $request->user()->cashMovements()->create([
            'cash_account_id' => $cashAccount->id,
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'movement_date' => $validated['movement_date'],
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()
            ->route('cash-movements.index')
            ->with('success', 'Movimentação registrada com sucesso.');
    }

    public function show(CashMovement $cashMovement)
    {
        $this->authorizeOwner($cashMovement);

        return view('cash-movements.show', compact('cashMovement'));
    }

    public function edit(Request $request, CashMovement $cashMovement)
    {
        $this->authorizeOwner($cashMovement);

        $cashAccounts = $request->user()
            ->cashAccounts()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $types = CashMovement::types();

        return view('cash-movements.edit', compact('cashMovement', 'cashAccounts', 'types'));
    }

    public function update(Request $request, CashMovement $cashMovement)
    {
        $this->authorizeOwner($cashMovement);

        $validated = $request->validate([
            'cash_account_id' => ['required', 'exists:cash_accounts,id'],
            'type' => ['required', 'in:' . implode(',', CashMovement::types())],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'description' => ['required', 'string', 'max:255'],
            'movement_date' => ['required', 'date'],
            'notes' => ['nullable', 'string'],
        ]);

        $request->user()
            ->cashAccounts()
            ->findOrFail($validated['cash_account_id']);

        $cashMovement->update($validated);

        return redirect()
            ->route('cash-movements.index')
            ->with('success', 'Movimentação atualizada com sucesso.');
    }

    public function destroy(CashMovement $cashMovement)
    {
        $this->authorizeOwner($cashMovement);

        $cashMovement->delete();

        return redirect()
            ->route('cash-movements.index')
            ->with('success', 'Movimentação removida com sucesso.');
    }

    private function authorizeOwner(CashMovement $cashMovement): void
    {
        abort_if($cashMovement->user_id !== auth()->id(), 403);
    }
}
