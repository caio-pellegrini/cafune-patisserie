<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Checkout | Cafuné</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>

    </style>

</head>

<body class="antialiased">
    @include('layouts.navigation')


    <div class="sm:justify-center sm:items-center relative min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <form action="{{ route('novoPedido') }}" method="POST">
            @csrf

            <input type="hidden" name="total" value="{{ \Cart::getTotal() }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="order_items" value="{{ \Cart::getContent() }}">
            

            <div class="py-12">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2 space-y-6">
                        {{-- Seção 'Resumo do Pedido' --}}
                        <div class="p-8 bg-white shadow rounded-lg">
                            <h2 class="text-xl font-semibold mb-2">Resumo do Pedido</h2>
                            @foreach($cartItems as $item)
                            <div class="flex items-center justify-between p-4 bg-white shadow rounded-lg mb-2">
                                <img src="{{ asset('storage/' . $item->attributes->image) }}" alt="{{ $item->name }}" class="h-14 w-14 rounded-full object-cover">
                                <div class="flex-grow ml-4">
                                    <h3 class="font-bold text-lg">{{ $item->name }}</h3>
                                    <p>Quantidade: {{ $item->quantity }}</p>
                                    <p class="text-gray-500">R$ {{ number_format($item->price, 2, ',', '.') }}</p>
                                </div>
                            </div>
                            @endforeach
                            {{-- Título e Botão para Retornar ao Carrinho --}}
            <a href="{{ route('exibircarrinho') }}" class=" mt-4 inline-flex items-center px-4 py-2 bg-cafune border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-azur dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
          <span class="material-symbols-outlined material-google mr-1">arrow_back</span>  
          Voltar para Carrinho
          </a>
                        </div>
                        <div class="p-8 bg-white shadow rounded-lg">
                            {{-- Seção 'Informações do Cliente' --}}
                            <section>
                                <h2 class="text-xl font-semibold mb-2">{{ __('Informações de perfil') }}</h2>

                                {{-- Exibindo as informações do usuário --}}
                                <div class="mt-4">
                                    <p><strong>{{ __('Name') }}:</strong> {{ $user->name }}</p>
                                    <p><strong>{{ __('Email') }}:</strong> {{ $user->email }}</p>

                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div>
                                        <div class="bg-red-100 border border-red-400 text-red-800 px-3 py-2 text-sm rounded relative " role="alert">

                                            <span class="block sm:inline">{{ __('Você precisa') }}</span>
                                            <span class="block sm:inline">
                                                <a href="{{ route('profile.edit') }}" class="underline">
                                                    {{ __('verificar seu endereço e-mail') }}
                                                </a>
                                            </span>
                                            <span class="block sm:inline">{{ __(' para prosseguir com o pedido.') }}</span>
 
                                        </div>
                                    </div>
                                    @endif
                                    <p><strong>{{ __('Phone') }}:</strong> {{ $user->phone ?? 'Não definido' }}</p>
                                    <p><strong>{{ __('Address') }}:</strong> {{ $user->address ?? 'Não definido' }}</p>
                                </div>

                                {{-- Instruções para editar o perfil --}}
                                <div class="mt-6">
                                    <p class="text-sm text-gray-600">
                                        {{ __('Se deseja alterar suas informações de perfil, por favor, acesse a página de ') }}
                                        <a href="{{ route('profile.edit') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                                            {{ __('edição de perfil') }}.
                                        </a>
                                    </p>
                                </div>

                            </section>

                        </div>

                        <div class="p-8 bg-white shadow rounded-lg">
                            {{-- Seção 'Opções de Entrega' --}}

                            <h2 class="text-xl font-semibold mb-2">Opções de Entrega</h2>
                            <label>
                                <input type="radio" name="delivery_option" value="pickup" checked >
                                Retirada
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="delivery_option" value="delivery">
                                Delivery
                            </label>
                        </div>

                        <div class="p-8 bg-white shadow rounded-lg">
                            {{-- Seção 'Opções de Pagamento' --}}

                            <h2 class="text-xl font-semibold mb-2">Opções de Pagamento</h2>
                            <select name="payment_method" id="payment_method" class="mb-2">
                                <option value="pix">Pix</option>
                                <option value="debit_card">Cartão de Débito</option>
                                <option value="credit_card">Cartão de Crédito</option>
                            </select>

                            {{-- Campos para Cartão de Débito e Crédito --}}
                            <div id="card_info" class="hidden">
                                <input type="text" name="card_number" placeholder="Número do Cartão" class="mb-2">
                                <input type="text" name="card_expiry" placeholder="Data de Expiração" class="mb-2">
                                <input type="text" name="card_cvv" placeholder="CVV" class="mb-2">
                                <input type="number" name="installments" placeholder="Número de Parcelas" class="mb-2">
                            </div>

                        </div>
                    </div>




                    <div class="md:col-span-1 space-y-6">
                        <div class="p-8 bg-white shadow rounded-lg">
                            {{-- Seção 'Resumo do Pedido' --}}

                            <h2 class="text-xl font-semibold mb-2">Resumo do Pedido</h2>
                            <div class="mt-4">
                                <p class="flex justify-between items-center">
                                    <span>Total: </span>
                                    <span>R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</span>
                                    
                                </p>
                                <hr>
                                <p class="flex justify-between items-center">
                                    <span>Entrega: </span>
                                    <span id="delivery_options_summary"></span>
                                </p>
                                <hr>
                                <p class="flex justify-between items-center">
                                    <span>Pagamento: </span>
                                    <span id="payment_method_summary">Retirada</span>
                                </p>
                            </div>


                            {{-- Botão 'Finalizar Pedido' --}}
                            <button id="finalizar-pedido"
                            @if(auth()->check() && auth()->user()->hasVerifiedEmail())
                                type="submit"
                            @else
                                type="button"
                            @endif
                            class="mt-4 inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            <span class="material-symbols-outlined material-google mr-1">check</span>  
                            Finalizar Pedido
                            </button>
                        </div>

                    </div>
                </div>
            </div>


        </form>



    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentMethodSelect = document.getElementById('payment_method');
            const cardInfoDiv = document.getElementById('card_info');
            const paymentMethodSummary = document.getElementById('payment_method_summary');
            paymentMethodSummary.innerText = 'Pix';

            paymentMethodSelect.addEventListener('change', function() {
                if (this.value === 'debit_card') {
                    cardInfoDiv.style.display = 'block';
                    paymentMethodSummary.innerText = 'Cartão de Débito';

                } else if (this.value === 'credit_card') {
                    cardInfoDiv.style.display = 'block';
                    paymentMethodSummary.innerText = 'Cartão de Crédito';

                } else {
                    cardInfoDiv.style.display = 'none';
                }
            });

        });
        function updateDeliverySummary() {
        var deliveryOptions = document.getElementsByName('delivery_option');
        var selectedOption = 'Retirada'; // Valor padrão

        for(var i = 0; i < deliveryOptions.length; i++) {
            if(deliveryOptions[i].checked) {
                selectedOption = deliveryOptions[i].value === 'pickup' ? 'Retirada' : 'Delivery';
                break;
            }
        }

        document.getElementById('delivery_options_summary').textContent = selectedOption;
    }

    // Adicionando event listeners aos botões de rádio
    var deliveryOptions = document.getElementsByName('delivery_option');
    for(var i = 0; i < deliveryOptions.length; i++) {
        deliveryOptions[i].addEventListener('change', updateDeliverySummary);
    }

        document.getElementById('finalizar-pedido').addEventListener('click', function(event) {
        @if(auth()->check() && !auth()->user()->hasVerifiedEmail())
            event.preventDefault();
            alert('Por favor, verifique seu e-mail para finalizar o pedido.');
        @elseif(auth()->guest())
            event.preventDefault();
            alert('Por favor, autentique-se para finalizar seu pedido.');
        @endif
    });
    </script>

</body>

</html>