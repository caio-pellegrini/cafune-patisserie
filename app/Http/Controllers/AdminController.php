<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AdminController extends Controller
{
    public function index() {
        $user = Auth::user();

        $activeOrders = Order::whereNotIn('status', ['concluido', 'cancelado'])->get();
        $completedOrders = Order::whereIn('status', ['concluido', 'cancelado'])->get();

        return view('admin.index', compact('user', 'activeOrders', 'completedOrders'));
    }


    // Método para atualizar o status do pedido
    public function update(Request $request, $orderId) {
        $order = Order::findOrFail($orderId);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Status do pedido '.$orderId.' atualizado com sucesso! ('.$order->status.')');
    }
}
