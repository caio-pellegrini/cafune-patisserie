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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
    .material-symbols-outlined {
            font-variation-settings:
                'FILL' 1,
                'wght' 600,
                'GRAD' 0,
                'opsz' 24
        }

        .material-google {
            color: white;
        }
  </style>
</head>

<body class="antialiased">
  @include('layouts.navigation')

  <!-- Popup Message Box -->
  <div id="popup-message" class="hidden fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white border border-gray-200 rounded shadow-lg p-4 z-50">
    <p id="popup-message-content" class="text-sm text-gray-700">Your message here...</p>
  </div>

  <div class="sm:justify-center sm:items-center relative min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if ($mensagem = Session::get('sucesso'))
    <script>
      showPopupMessage("{{ $mensagem }}", 3000);
    </script>
    @endif


    @if ($mensagem = Session::get('sucesso'))
    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
      </svg>
      <span class="sr-only">Success</span>
      <div class="ms-3 text-sm font-medium">
        {{ $mensagem }}
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
    @endif

    <!--
    @if ($mensagem = Session::get('aviso'))
    <div class="card green">
      <div class="card-content white-text">
        <span class="card-title">Tudo bem</span>
        <p>{{ $mensagem }}</p>
      </div>
    </div>
    @endif
    -->

    <div class="sm:justify-center sm:items-center relative min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
      <div class="py-12">


        @if($itens->count() == 0)
        <div class="card blue">
          <div class="card-content white-text">
            <span class="card-title">Seu carrinho está vazio</span>
            <p>Aproveite nossas promoções</p>
          </div>
        </div>


        @else
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Seu carrinho possui '). $itens->count() .__(' itens.') }}
        </h2>


        <div class="px-12 mx-auto">
        <table >
          <thead>
            <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($itens as $item)
            <tr>
              <td ><img src="{{ asset('storage/' . $item->attributes->image) }}" alt="{{ $item->name }}" class="h-14 w-14 rounded-full object-cover"></td>
              <td>{{ $item->name }}</td>
              <td>R$ {{ number_format($item->price, 2, ',', '.') }}/{{ $item->attributes->unit_of_measure }}</td>
              {{-- BTN ATUALIZAR --}}
              <form action="{{ route('atualizacarrinho') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
                <td><input style="width: 50px; font-weight: 900;" class="white center quantity-input" type="number" min="1" name="quantity" value="{{ $item->quantity }}"></td>
              </form>
              <td>


                {{-- BTN DELETAR --}}
                <form action="{{ route('removecarrinho') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                </form>
              </td>
            </tr>
            @endforeach
            

          </tbody>
          <tfoot>
          <tr>
              <td></td>
              <td></td>
              <td><p class="font-bold">Valor Total: R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }}</p></td>
            </tr>
          </tfoot>
        </table>
        </div>

        <div class="row container center mt-5 space-x-5">


       
          <a href="{{ route('cardapio') }}" class="inline-flex items-center px-4 py-2 bg-cafune border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-azur dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
          <span class="material-symbols-outlined material-google mr-1">arrow_back</span>  
          Continuar comprando
          </a>

          
          <a href="{{ route('limpacarrinho') }}" class="inline-flex items-center px-4 py-2 bg-cafune border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-azur dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
          <span class="material-symbols-outlined material-google mr-1">clear</span>  
          Limpar carrinho
          </a>


          <a id="finalizar-pedido" @auth href="{{ route('listarCheckout') }}" @endauth class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
          <span class="material-symbols-outlined material-google mr-1">check</span>  
          Finalizar Pedido
          </a>


        </div>

        @endif



      </div>

    </div>




  </div>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var quantityInputs = document.querySelectorAll('.quantity-input');

      quantityInputs.forEach(function(input) {
        input.addEventListener('change', function() {
          this.form.submit();
        })
      });

    });

    function showPopupMessage(message, duration = 5000) {
      const popup = document.getElementById('popup-message');
      const content = document.getElementById('popup-message-content');

      // Set the message
      content.textContent = message;

      // Show the popup
      popup.classList.remove('hidden');

      // Set a timer to hide the popup after 'duration' milliseconds
      setTimeout(() => {
        popup.classList.add('hidden');
      }, duration);
    }

    document.getElementById('finalizar-pedido').addEventListener('click', function(event) {
        @guest
            event.preventDefault();
            alert('Por favor, autentique-se para finalizar seu pedido.');
        @endguest
    });
  </script>

</body>

</html>