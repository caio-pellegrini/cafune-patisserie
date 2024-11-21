<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cardápio | Cafuné</title>

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
        :target {
            scroll-margin-top: 110px;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 1,
                'wght' 600,
                'GRAD' 0,
                'opsz' 24
        }

        .material-google {
            margin-top: 8px;
        }
    </style>

</head>

<body class="antialiased">
    @include('layouts.navigation')



    <div class="sm:justify-center sm:items-center relative min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white {{ request()->routeIs('cardapio') ? 'pt-16' : '' }}"> 
        {{--Links acesso rápido --}}
        <div class="flex justify-center space-x-4 bg-gray-100 p-4 fixed  w-full z-50 ">

            @foreach ($categories as $category)
            <a href="#{{ strtolower($category->name) }}" class="font-sans px-5 py-1 text-white rounded-3xl bg-azur hover:bg-cafune transition duration-300">
                {{ mb_strtoupper($category->name, 'UTF-8') }}
            </a>
            @endforeach
        </div>




        @if($categories->count())
        @foreach ($categories as $category)
        <div id="{{ strtolower($category->name) }}" class="md:max-w-2x1 md:mx-28 lg:mx-56 items-center justify-between px-4 py-5 my-10">
            <h3 class="font-bold text-xl">{{ $category->name }}</h3> {{-- Nome da categoria --}}

            <div class="space-y-4"> {{-- Produtos da categoria --}}
                @foreach ($category->products as $product)
                <div class="flex items-center justify-between p-4">
                    {{-- Exibe a imagem --}}
                    <img src="{{ asset('storage' . $product->product_image) }}" alt="{{ $product->name }}" class="h-14 w-14 rounded-full object-cover"> {{-- Estilos de imagem do produto --}}

                    <div class="flex-grow ml-4">
                        <h2 class="font-bold text-lg">{{ $product->name }}</h2> {{-- Estilos de nome do produto --}}
                        <p class="text-gray-500">{{ $product->description }}</p>
                    </div>

                    <div class="">
                        <p class="text-gray-500 mr-2">R$ {{ number_format($product->price, 2, ',', '.') }}/{{ $product->unit_of_measure }}</p> {{-- Estilos de preço do produto --}}
                    </div>

                    <div class="flex items-center space-x-2">
                        <form class="add-to-cart-form" action="{{ route('addcarrinho') }}" method="POST">

                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="img" value="{{ $product->product_image }}">
                            <input type="hidden" name="unit" value="{{ $product->unit_of_measure }}">
                            <div class="flex items-center">
                                {{-- Botões de adição e remoção --}}
                                <button type="button" class="decrease-quantity text-azur bg-transparent hover:bg-gray-200 p-2 rounded-full" data-id="{{ $product->id }}">
                                    <span class="material-symbols-outlined material-google">remove</span>
                                </button>
                                <span id="quantity-{{ $product->id }}">0</span>
                                <button type="button" class="increase-quantity text-azur bg-transparent hover:bg-gray-200 p-2 rounded-full" data-id="{{ $product->id }}">
                                    <span class="material-symbols-outlined material-google">add</span>
                                </button>

                                {{-- Input escondido para armazenar a quantidade --}}
                                <input type="hidden" name="qnt" id="input-quantity-{{ $product->id }}" value="0">

                                <button>
                                    <i class="shopping-cart-btn material-icons material-symbols-outlined">
                                        add_shopping_cart
                                    </i>
                                </button>
                            </div>

                        </form>
                    </div>
                    @if ((session('adicionado') == $product->id))
                    <!-- Popup Message Box -->
                    <div id="popup-message" class=" fixed bottom-4 right-4 bg-white border border-gray-200 rounded shadow-lg p-4 z-50">
                    <p id="popup-message-content" class="text-sm text-gray-700">Your message here...</p>
                    </div>

                    
                    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Success</span>
                        <div class="ms-3 text-sm font-medium">Produto adicionado</div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    @endif

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
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var forms = document.querySelectorAll('.add-to-cart-form');

            forms.forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    var quantity = form.querySelector('[name="qnt"]').value;

                    if (quantity <= 0) {
                        event.preventDefault();
                        alert('Por favor, insira uma quantidade maior que zero.');
                    }
                });

            });

            document.querySelectorAll('.increase-quantity').forEach(function(button) {
                button.addEventListener('click', function() {
                    var productId = this.getAttribute('data-id');
                    var quantitySpan = document.getElementById('quantity-' + productId);
                    var quantityInput = document.getElementById('input-quantity-' + productId);

                    var currentQuantity = parseInt(quantitySpan.textContent, 10);
                    quantitySpan.textContent = currentQuantity + 1;
                    quantityInput.value = currentQuantity + 1;
                });
            });

            document.querySelectorAll('.decrease-quantity').forEach(function(button) {
                button.addEventListener('click', function() {
                    var productId = this.getAttribute('data-id');
                    var quantitySpan = document.getElementById('quantity-' + productId);
                    var quantityInput = document.getElementById('input-quantity-' + productId);

                    var currentQuantity = parseInt(quantitySpan.textContent, 10);
                    if (currentQuantity > 0) {
                        quantitySpan.textContent = currentQuantity - 1;
                        quantityInput.value = currentQuantity + 1;
                    };

                })
            });

        });
    </script>
</body>

</html>