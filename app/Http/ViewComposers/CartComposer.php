<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class CartComposer
{
    public function compose(View $view)
    {
        $cart = session()->get('cart', []);
        $cartItemCount = count($cart);
        $cartTotal = $this->calculateTotal($cart);

        $view->with('cartItemCount', $cartItemCount);
        $view->with('cartTotal', $cartTotal);
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
