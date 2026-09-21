<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index()
{
    $clients = Client::orderBy('name')->paginate(10);
    return view('admin.clients.index', compact('clients'));
}

   public function create()
{
    return view('admin.clients.create');
}

   public function store(ClientRequest $request)
{
    Client::create($request->validated());
    return redirect()->route('admin.clients.index')->with('success', 'Cliente cadastrado!');
}

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

   public function edit(Client $client)
{
    return view('admin.clients.edit', compact('client'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('admin.clients.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Cliente excluído com sucesso.');
    }
}
