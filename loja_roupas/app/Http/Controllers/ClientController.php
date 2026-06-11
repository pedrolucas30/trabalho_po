<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index()
{
    $clients = Client::orderBy('name')->paginate(10);
    return view('clients.index', compact('clients'));
}

   public function create()
{
    return view('clients.create');
}

   public function store(ClientRequest $request)
{
    Client::create($request->validated());
    return redirect()->route('clients.index')->with('success', 'Cliente cadastrado!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

   public function edit(Client $client)
{
    return view('clients.edit', compact('client'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
