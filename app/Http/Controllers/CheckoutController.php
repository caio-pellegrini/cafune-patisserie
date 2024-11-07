<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function resumoPedido() {
        $cartItems = Cart::getContent();
        $user = Auth::user();
        return view('checkout', compact('cartItems', 'user'));
    }

    
}
