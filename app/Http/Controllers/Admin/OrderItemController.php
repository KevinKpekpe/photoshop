<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function update(Request $request, OrderItem $orderItem)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderItem->update($validatedData);

        // Recalculate order total
        $order = $orderItem->order;
        $order->total = $order->orderItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $order->save();

        return redirect()->route('admin.orders.show', $orderItem->order_id)->with('success', 'Élément de commande mis à jour avec succès.');
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderId = $orderItem->order_id;
        $orderItem->delete();

        // Recalculate order total
        $order = Order::find($orderId);
        $order->total = $order->orderItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $order->save();

        return redirect()->route('admin.orders.show', $orderId)->with('success', 'Élément de commande supprimé avec succès.');
    }
}
