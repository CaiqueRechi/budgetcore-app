<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Client;
use App\Models\Payable;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        $accounts = Account::query()
            ->where('user_id', $user->id)
            ->get();

        $pendingPayables = Payable::query()
            ->where('user_id', $user->id)
            ->where('status', 'pending');

        $upcomingPayables = (clone $pendingPayables)
            ->orderBy('due_date')
            ->limit(5)
            ->get();

        $monthlyPayablesTotal = Payable::query()
            ->where('user_id', $user->id)
            ->whereMonth('due_date', now()->month)
            ->whereYear('due_date', now()->year)
            ->sum('amount');

        return view('dashboard', [
            'totalBalance' => $accounts->sum('balance'),
            'monthlyIncome' => 0,
            'monthlyExpenses' => $monthlyPayablesTotal,
            'pendingPayablesCount' => (clone $pendingPayables)->count(),
            'clientsCount' => Client::query()->where('user_id', $user->id)->count(),
            'suppliersCount' => Supplier::query()->where('user_id', $user->id)->count(),
            'accountsCount' => Account::query()->where('user_id', $user->id)->count(),
            'cashFlowsCount' => 0,
            'upcomingPayables' => $upcomingPayables,
        ]);
    }
}
