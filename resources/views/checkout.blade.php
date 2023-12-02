<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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


    <div class="sm:justify-center sm:items-center relative min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white {{ request()->routeIs('cardapio') ? 'pt-16' : '' }}">

        <form action="{{ route('processarCheckout') }}" method="POST">
            @csrf

            {{-- Título e Botão para Retornar ao Carrinho --}}
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Checkout</h1>
                <a href="{{ route('exibircarrinho') }}" class="text-blue-500 hover:text-blue-700">Voltar para o Carrinho</a>
            </div>

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
                        </div>
                        <div class="p-8 bg-white shadow rounded-lg">
                            {{-- Seção 'Informações do Cliente' --}}
                            <section>
                                <h2 class="text-xl font-semibold mb-2">{{ __('Informações de perfil') }}</h2>

                                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                    @csrf
                                </form>

                                <form method="post" action="{{ route('profile.edit') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('patch')

                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                    </div>

                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                        <div>
                                            <p class="text-sm mb-2 text-gray-800 dark:text-gray-200">
                                                {{ __('Apenas usuários verificados podem realizar pedidos.') }}

                                                <a href="{{ route('profile.edit') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                    {{ __('Acesse o perfil para verificar seu endereço e-mail.') }}
                                                </a>
                                            </p>
                                        </div>
                                        @endif
                                    </div>

                                    <div>
                                        <x-input-label for="phone" :value="__('Phone')" />
                                        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
                                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                    </div>

                                    <div>
                                        <x-input-label for="address" :value="__('Address')" />
                                        <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" required autofocus autocomplete="address" />
                                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                    </div>


                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                                        @if (session('status') === 'profile-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>
                            </section>

                        </div>

                        <div class="p-8 bg-white shadow rounded-lg">
                            {{-- Seção 'Opções de Entrega' --}}

                            <h2 class="text-xl font-semibold mb-2">Opções de Entrega</h2>
                            <label>
                                <input type="radio" name="delivery_option" value="retirada" checked>
                                Retirada
                            </label>
                            <label>
                                <input type="radio" name="delivery_option" value="delivery">
                                Delivery (+R$ 5,00)
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


                            {{-- Botão 'Finalizar Pedido' --}}
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 mt-4 px-4 rounded">
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

            paymentMethodSelect.addEventListener('change', function() {
                if (this.value === 'debit_card' || this.value === 'credit_card') {
                    cardInfoDiv.style.display = 'block';
                } else {
                    cardInfoDiv.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>