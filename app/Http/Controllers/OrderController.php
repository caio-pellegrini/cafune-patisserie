<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function store(Request $request) {
        // Receber e Validar os Dados do Pedido
        $validatedData = $request->validate([
            'total' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'order_items' => 'required|json',
            'delivery_option' => 'required|in:pickup,delivery',
            'payment_method' => 'required|in:pix,debit_card,credit_card',
        ]);

        // Criar um novo registro na tabela orders
        $order = new Order();
        $order->user_id = $validatedData['user_id'];
        $order->total = $validatedData['total'];
        $order->payment_method = $validatedData['payment_method'];
        $order->delivery_method = $validatedData['delivery_option'];
        $order->status = 'pendente';
        $order->save();

        // Decodificar JSON e Criar Itens do Pedido (OrderItem):
        $items = json_decode($validatedData['order_items'], true);;
        foreach ($items as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->save();
        }

        // Retorna uma mensagem ao usuário
        return response()->json([
            'sucess' => true,
            'message' => 'Pedido criado com sucesso',
            'order_id' => $order->id
        ]);

    }


    public function index() {


    }


    
}
