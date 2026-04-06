<?php

namespace App\Http\Controllers;

use App\Enums\PayableStatus;
use App\Http\Requests\StorePayableRequest;
use App\Http\Requests\UpdatePayableRequest;
use App\Models\Payable;
use Illuminate\Http\Request;

class PayableController extends Controller
{
    public function index(Request $request)
    {
        $payables = $request->user()
            ->payables()
            ->with(['supplier', 'cashAccount'])
            ->orderBy('due_date')
            ->paginate(10);

        return view('payables.index', compact('payables'));
    }

    public function create(Request $request)
    {
        $suppliers = $request->user()
            ->suppliers()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $cashAccounts = $request->user()
            ->cashAccounts()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('payables.create', compact('suppliers', 'cashAccounts'));
    }

    public function store(StorePayableRequest $request)
    {
        $validated = $request->validated();

        $request->user()->payables()->create([
            ...$validated,
            'status' => PayableStatus::Pending,
            'paid_at' => null,
        ]);

        return redirect()
            ->route('payables.index')
            ->with('success', 'Conta a pagar criada com sucesso.');
    }

    public function show(Payable $payable)
    {
        $this->authorizeOwner($payable);

        $payable->load(['supplier', 'cashAccount']);

        return view('payables.show', compact('payable'));
    }

    public function edit(Request $request, Payable $payable)
    {
        $this->authorizeOwner($payable);

        $suppliers = $request->user()
            ->suppliers()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $cashAccounts = $request->user()
            ->cashAccounts()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('payables.edit', compact('payable', 'suppliers', 'cashAccounts'));
    }

    public function update(UpdatePayableRequest $request, Payable $payable)
    {
        $this->authorizeOwner($payable);

        $validated = $request->validated();

        $status = (int) $validated['status'];

        $payable->update([
            'supplier_id' => $validated['supplier_id'],
            'cash_account_id' => $validated['cash_account_id'] ?? null,
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'due_date' => $validated['due_date'],
            'notes' => $validated['notes'] ?? null,
            'status' => $status,
            'paid_at' => $status === PayableStatus::Paid->value
                ? ($payable->paid_at ?? now())
                : null,
        ]);

        return redirect()
            ->route('payables.index')
            ->with('success', 'Conta a pagar atualizada com sucesso.');
    }

    public function destroy(Payable $payable)
    {
        $this->authorizeOwner($payable);

        $payable->delete();

        return redirect()
            ->route('payables.index')
            ->with('success', 'Conta a pagar removida com sucesso.');
    }

    private function authorizeOwner(Payable $payable): void
    {
        abort_if($payable->user_id !== auth()->id(), 403);
    }
}
