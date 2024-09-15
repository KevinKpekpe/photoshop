<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('user', 'orderItems.product', 'payment');
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order->update($validatedData);

        return redirect()->route('admin.orders.show', $order)->with('success', 'Statut de la commande mis à jour avec succès.');
    }

    public function destroy(Order $order)
    {
        $order->update(['actif' => false]);
        return redirect()->route('admin.orders.index')->with('success', 'Commande désactivée avec succès.');
    }
}
