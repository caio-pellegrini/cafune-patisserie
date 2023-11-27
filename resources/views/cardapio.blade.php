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
</head>

<body class="antialiased">
    @include('layouts.navigation')


    <!-- Page Heading -->
    <!--
    @if (isset($header))
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif
    -->


    <div class="sm:justify-center sm:items-center relative min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="flex justify-center space-x-4 bg-gray-100 p-4">
            @foreach ($categories as $category)
            <a href="#{{ strtolower($category->name) }}"
            class="font-sans px-5 py-1 text-white rounded-3xl bg-azur hover:bg-cafune transition duration-300">
            {{ mb_strtoupper($category->name, 'UTF-8') }}
            </a>
            @endforeach
        </div>


        @if($categories->count())
        @foreach ($categories as $category)
        <div id="{{ strtolower($category->name) }}" class="md:max-w-2x1 md:mx-60 items-center justify-between p-4 my-10">
            <h3 class="font-bold text-xl">{{ $category->name }}</h3> {{-- Nome da categoria --}}

            <div class="space-y-4"> {{-- Produtos da categoria --}}
            @foreach ($category->products as $product)
            <div class="flex items-center justify-between p-4">
                {{-- Verifica se existe um caminho de imagem e exibe a imagem --}}
                @if($product->product_image)
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->name }}" class="h-16 w-16 rounded-full object-cover"> {{-- Estilos de imagem do produto --}}
                @endif

                <div class="flex-grow">
                    <h2 class="font-bold text-lg">{{ $product->name }}</h2> {{-- Estilos de nome do produto --}}

                </div>

                <div class="">
                    <p class="text-gray-500 mr-2">R$ {{ number_format($product->price, 2, ',', '.') }}/{{ $product->unit_of_measure }}</p> {{-- Estilos de preço do produto --}}
                </div>

                {{-- Botões de ação e unidade selecionada --}}
                <div class="flex items-center">
                    <button class="text-gray-500 bg-transparent hover:bg-gray-200 p-2 rounded-full">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path d="M19,13H5V11H19V13Z" />
                        </svg>
                    </button>
                    <span class="mx-2 text-lg">1</span> {{-- A unidade selecionada --}}
                    <button class="text-gray-500 bg-transparent hover:bg-gray-200 p-2 rounded-full">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path d="M13,19V5h-2v14H13Z M19,13H5v-2H19v2Z" />
                        </svg>
                    </button>
                </div>

            </div>
            <hr>
            @endforeach
        </div>
        </div>

        
        @endforeach
        @else
        <p class="text-center text-gray-500">Nenhum produto encontrado.</p>
        @endif

    </div>

</body>

</html>