<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = $request->user()
            ->clients()
            ->orderBy('name')
            ->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $validated = $request->validated();

        $request->user()->clients()->create([
            ...$validated,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente criado com sucesso.');
    }

    public function show(Client $client)
    {
        $this->authorizeOwner($client);

        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $this->authorizeOwner($client);

        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $this->authorizeOwner($client);

        $validated = $request->validated();

        $client->update([
            ...$validated,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(Client $client)
    {
        $this->authorizeOwner($client);

        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente removido com sucesso.');
    }

    private function authorizeOwner(Client $client): void
    {
        abort_if($client->user_id !== auth()->id(), 403);
    }
}
