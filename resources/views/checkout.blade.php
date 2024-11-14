<x-app-layout>
    <div class="sm:justify-center sm:items-center relative min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <form id="checkout-form" action="{{ route('novoPedido') }}" method="POST">
            @csrf

            <!-- Envia o total e o ID do usuário -->
            <input type="hidden" name="total" value="{{ Cart::getTotal() }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <!-- JSON com os itens do carrinho -->
            <input type="hidden" name="products" id="products">
            <!-- Endereço de entrega (pode preencher dinamicamente ou deixar para o usuário) -->
            <input type="hidden" name="shipping_address" id="shipping_address" value="{{ $user->address ?? '' }}">

            <!-- Conteúdo do formulário e resumo do pedido -->
            <div class="py-12">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2 space-y-6">
                        <div class="p-8 bg-white shadow rounded-lg">
                            <h2 class="text-xl font-semibold mb-2">Resumo do Pedido</h2>
                            @foreach ($cartItems as $item)
                                <div class="flex items-center justify-between p-4 bg-white shadow rounded-lg mb-2">
                                    <img src="{{ asset('storage/' . $item->attributes->image) }}"
                                        alt="{{ $item->name }}" class="h-14 w-14 rounded-full object-cover">
                                    <div class="flex-grow ml-4">
                                        <h3 class="font-bold text-lg">{{ $item->name }}</h3>
                                        <p>Quantidade: {{ $item->quantity }}</p>
                                        <p class="text-gray-500">R$ {{ number_format($item->price, 2, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                            <a href="{{ route('exibircarrinho') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-cafune border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-azur dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <span class="material-symbols-outlined material-google mr-1">arrow_back</span>
                                Voltar para Carrinho
                            </a>
                        </div>

                        <!-- Campos adicionais de entrega e pagamento... -->

                        <button id="finalizar-pedido" type="submit"
                            class="mt-4 inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            <span class="material-symbols-outlined material-google mr-1">check</span>
                            Finalizar Pedido
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Converte o conteúdo do carrinho em JSON e define no campo oculto
            const cartItems = @json($cartItems->map(function($item) {
                return [
                    'id' => $item->id,
                    'quantity' => $item->quantity
                ];
            }));

            document.getElementById('products').value = JSON.stringify(cartItems);

            // Verificação adicional para campos de endereço e email verificado
            document.getElementById('finalizar-pedido').addEventListener('click', function(event) {
                @if (auth()->check() && !auth()->user()->hasVerifiedEmail())
                    event.preventDefault();
                    alert('Por favor, verifique seu e-mail para finalizar o pedido.');
                @elseif (auth()->guest())
                    event.preventDefault();
                    alert('Por favor, autentique-se para finalizar seu pedido.');
                @endif
            });
        });
    </script>
</x-app-layout>
