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



</head>

<body class="font-aurore bg-[#ffffff] text-[#333] antialiased">
    @include('layouts.navigation')


    <div id="flex justify-center items-center">
        <div id="text-[#000] text-center mx-[40px] my-[50px] max-w-[80%]">
            <h1 class="text-[2.5rem] text-[#000] flex justify-center mt-[50px] text-2.5xl md:text-4xl lg:text-5xl">Cafuné, le goût de l'affection</h1>
        </div>
    </div>

    <section class="ml-[80px] mr-[80px] sm:ml-[250px] sm:mr-[250px] text-[20px] mt-[30px]">
        <p class="mb-[3px] text-[#555]">Bem-vindo à Cafuné Pâtisserie, onde cada doce conta uma história de carinho e sabor. Fundada com paixão e tradição, a Cafuné é mais do que uma simples padaria, é um refúgio de afeto onde os aromas da França se encontram com a calorosa hospitalidade brasileira!</p>
    </section>

    <section class="items-center p-[5px] flex justify-center items-center flex-wrap text-center max-w-[800px] mx-[auto] my-[0] bg-[#f8f8f8] p-[10px] border-[1px] border-[solid] border-[#ddd] mt-[50px] mb-[50px]">
        <div class="flex-[1] text-justify p-[20px] font-['Lateef',_serif] text-[18px]">
            <p class="mb-[3px] text-[#555]">Nossa fundadora, Margot Blanc, nascida em Paris, trouxe consigo não apenas receitas tradicionais, mas também a essência da cidade do amor. Apaixonada pela arte da pâtisserie desde jovem, ela veio ao Brasil,onde decidiu criar a Cafuné, uma padaria de alto padrão.</p>
            <p class="mb-[3px] text-[#555]">Essa grande mulher tornou seu sonho realidade e trouxe um lugar com experiência única para os brasileiros.</p>
        </div>
        <img class="max-w-[80%] h-[280px] max-w-full h-auto p-[15px] transition-transform transform hover:scale-110" src="{{ asset('/images/Criadora.png') }}" alt="Margot Blanc">
    </section>


    <section class="ml-[80px] mr-[80px] sm:ml-[250px] sm:mr-[250px] text-[20px] mt-[30px]">
        <p class="mb-[3px] text-[#555]">Queremos que cada visita à Cafuné seja como um abraço caloroso. Nosso ambiente foi projetado para oferecer não apenas deliciosas opções de pâtisserie, mas também um espaço onde os clientes se sintam em casa.</p>
    </section>

    <section class="max-w-[800px] mx-[auto] my-[0] px-[20px] py-[40px] text-center">
        <img class="max-w-[80%] h-[300px] max-w-full block mx-[auto] my-[0] transition-transform transform hover:scale-110" src="{{ asset('/images/Retrô.png') }}" alt="A primeira loja Cafuné do Brasil - 1963" class="cafuné-image">
        <p class="text-[14px] mt-[10px] font-['Lateef',_serif] text-[#707070]">
            A primeira loja Cafuné do Brasil - 1963
        </p>
    </section>

    <section class="ml-[80px] mr-[80px] sm:ml-[250px] sm:mr-[250px] text-[20px] mt-[30px]">
        Na Cafuné, acreditamos que a boa comida tem o poder de unir as pessoas. Estamos aqui para compartilhar um pedacinho da França, um sorriso acolhedor e, é claro, muitos doces momentos com você. Seja bem-vindo à nossa casa, a Cafuné Pâtisserie.
    </section>

    <hr>

    <h3 class="mt-[30px] text-[28px] text-center">Lojas Atuais</h3>

    <section class="flex justify-center items-center flex-wrap mx-[0] my-[20px]">
        <img class="max-w-[80%] h-[300px] max-w-[33%] m-[10px] transition-transform transform hover:scale-110" src="{{ asset('/images/Fachada 1.png') }}" alt="" class="cafuné-image" onclick="zoomImage(this)">
        <img class="max-w-[80%] h-[300px] max-w-[33%] m-[10px] transition-transform transform hover:scale-110" src="{{ asset('/images/Fachada 2.png') }}" alt="" class="cafuné-image" onclick="zoomImage(this)">
        <img class="max-w-[80%] h-[300px] max-w-[33%] m-[10px] transition-transform transform hover:scale-110" src="{{ asset('/images/Fachada 3.png') }}" alt="" class="cafuné-image" onclick="zoomImage(this)">
    </section>



</body>

</html>