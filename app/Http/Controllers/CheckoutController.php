<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function resumoPedido() {
        $cartItems = \Cart::getContent();
        $user = auth()->user();
        return view('checkout', compact('cartItems', 'user'));
    }

    public function finalizarPedido() {

    }
}
