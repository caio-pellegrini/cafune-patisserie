<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function resumoPedido()
    {
        $cartItems = Cart::getContent();
        $user = Auth::user();
        return view('checkout', compact('cartItems', 'user'));
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $shipping_address = $user->address;
        $cartItems = Cart::getContent(); // Obtém os itens diretamente do carrinho
        $lineItems = [];
        $total_amount = 0;

        // Prepara os itens para o Stripe e calcula o total
        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => env('CASHIER_CURRENCY', 'usd'),
                    'unit_amount' => $item->price * 100,
                    'product_data' => [
                        'name' => $item->name,
                    ],
                ],
                'quantity' => $item->quantity,
            ];
            $total_amount += $item->price * $item->quantity;
        }

        try {
            // Dados da sessão de checkout do Stripe
            $data = [
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'customer_email' => $user->email,
                'mode' => 'payment',
                'success_url' => route('checkout-success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout-cancel'),
            ];

            Log::info("Attempting to create Stripe checkout session", ['line_items' => $lineItems]);

            // Cria a sessão de checkout do Stripe
            $response = Http::asForm()->withHeaders([
                'Authorization' => 'Bearer ' . env('STRIPE_SECRET'),
            ])->post('https://api.stripe.com/v1/checkout/sessions', $data);

            if (!$response->successful()) {
                Log::error("Failed to create Stripe session", [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                throw new \Exception('Failed to create Stripe session. Response: ' . $response->body());
            }

            $checkoutSession = $response->json();

            // Cria o pedido no banco de dados
            $order = Order::create([
                'shipping_address' => $shipping_address,
                'user_id' => $user->id,
                'status' => 'unpaid',
                'session_id' => $checkoutSession['id'],
                'total' => $total_amount,
                'payment_method' => 'unknown', // Valor padrão para pagamento
                'delivery_method' => 'unknown', // Valor padrão para entrega
            ]);

            // Adiciona os itens ao pedido no banco de dados
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
            }

            Log::info("Stripe session created successfully", ['session_id' => $checkoutSession['id']]);

            // Redireciona o usuário para a página de pagamento do Stripe
            return redirect()->away($checkoutSession['url']);

        } catch (\Exception $e) {
            Log::error("Error during checkout process", ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function checkoutSuccess(Request $request)
    {
        $sessionId = $request->query('session_id');

        // Recupera a sessão de checkout do Stripe usando o Laravel HTTP Client
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('STRIPE_SECRET'),
        ])->get("https://api.stripe.com/v1/checkout/sessions/{$sessionId}");

        if (!$response->successful()) {
            Log::error("Failed to retrieve Stripe session", [
                'status' => $response->status(),
                'response' => $response->body()
            ]);
            return response()->json(['error' => 'Failed to retrieve session'], 500);
        }

        $checkoutSession = $response->json();

        if ($checkoutSession['payment_status'] == 'paid') {
            $order = Order::where('session_id', $sessionId)->first();
            $order->update(['status' => 'paid']);
            return redirect(env('APP_URL'));
        }
        
        return response()->json(['error' => 'Payment not completed'], 400);
    }
}
