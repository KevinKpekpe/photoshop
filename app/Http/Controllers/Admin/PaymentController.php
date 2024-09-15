<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order')->latest()->paginate(20);
        return view('admin.payments.index', compact('payments'));
    }

    public function show(Payment $payment)
    {
        $payment->load('order');
        return view('admin.payments.show', compact('payment'));
    }

    public function updateStatus(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'payment_status' => 'required|in:paid,unpaid,refunded',
        ]);

        $payment->update($validatedData);

        return redirect()->route('admin.payments.show', $payment)->with('success', 'Statut du paiement mis à jour avec succès.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:card,mobile,cash',
            'transaction_id' => 'nullable|string',
        ]);

        $validatedData['payment_status'] = 'paid';
        $validatedData['code'] = 'PAY-' . uniqid();

        $payment = Payment::create($validatedData);

        // Update order status
        $order = $payment->order;
        $order->status = 'completed';
        $order->save();

        return redirect()->route('admin.payments.show', $payment)->with('success', 'Paiement enregistré avec succès.');
    }

    public function destroy(Payment $payment)
    {
        $payment->update(['actif' => false]);
        return redirect()->route('admin.payments.index')->with('success', 'Paiement désactivé avec succès.');
    }
}
