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


    <div class="sm:justify-center sm:items-center relative min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">







    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        <p class="font-bold">Sucesso</p>
        <p>{{ session('success') }}</p>
    </div>
@endif





{{-- Pedidos Atuais --}}
<section class="mt-8 px-4 py-4 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Pedidos Atuais</h2>
    @foreach($currentOrders as $pedido)
    <div class="border-b border-gray-200 mb-4 pb-4">
        <h3 class="text-md font-semibold text-gray-600">Pedido #{{ $pedido->id }}</h3>
        <p class="text-sm text-gray-500">Status: <span class="text-green-500">{{ $pedido->status }}</span></p>
        <div class="mt-2">
            @foreach($pedido->orderItems as $item)
            <p class="text-sm text-gray-600">{{ $item->product->name }} - Quantidade: {{ $item->quantity }} - Preço: R$ {{ $item->price }}</p>
            @endforeach
        </div>
        <p class="text-sm font-semibold mt-2">Total: R$ {{ $pedido->total }}</p>
    </div>
    @endforeach
</section>

{{-- Pedidos Passados --}}
<section class="mt-8 px-4 py-4 bg-gray-50 shadow-md rounded-lg">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Histórico de Pedidos</h2>
    @foreach($pastOrders as $pedido)
    <div class="border-b border-gray-200 mb-4 pb-4">
        <h3 class="text-md font-semibold text-gray-600">Pedido #{{ $pedido->id }}</h3>
        <p class="text-sm text-gray-500">Status: <span class="text-red-500">{{ $pedido->status }}</span></p>
        <div class="mt-2">
            @foreach($pedido->orderItems as $item)
            <p class="text-sm text-gray-600">{{ $item->product->name }} - Quantidade: {{ $item->quantity }} - Preço: R$ {{ $item->price }}</p>
            @endforeach
        </div>
        <p class="text-sm font-semibold mt-2">Total: R$ {{ $pedido->total }}</p>
    </div>
    @endforeach
</section>




    </div>
</body>