<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('client')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::orderBy('name')->get();
        return view('admin.orders.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'total_amount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:pending,paid,shipped,cancelled'],
        ]);
        Order::create($data);
        return redirect()->route('admin.orders.index')->with('success', 'Pedido criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('client');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $clients = Client::orderBy('name')->get();
        return view('admin.orders.edit', compact('order', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'total_amount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:pending,paid,shipped,cancelled'],
        ]);
        $order->update($data);
        return redirect()->route('admin.orders.index')->with('success', 'Pedido atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pedido excluído com sucesso.');
    }
}
