<x-app-layout>

    <x-slot name="title">Cafuné Pâtisserie</x-slot>

    <x-slot name="dontPresetSlot"></x-slot>

    <div class="relative w-full overflow-hidden mb-auto sm:h-[60vh] -mt-px">
        <div class="absolute w-full h-full bg-black opacity-60"></div>

        <video class="w-full h-full object-cover" autoplay muted loop>
            <source src="{{ asset('/home/video.mp4') }}" type="video/mp4">
        </video>

        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <p class="font-aurore text-transparent text-center text-3xl md:text-5xl"
                style="text-shadow: 0 0 0px #FFF, 0 0 3px #FFF, 0 0 0px #FFF, 0 0 15px #000, 0 0 20px #000, 0 0 25px #000;">
                Cafuné, o sabor do carinho
            </p>
        </div>
    </div>

    <div class="flex justify-center items-center flex-wrap my-10">
        <img class="p-2 max-w-full" src="{{ asset('/home/Destaque 1.png') }}" alt="">
        <img class="p-2 max-w-full" src="{{ asset('/home/Destaque 2.png') }}" alt="">
        <div class="relative">
            <img class="p-2 max-w-full" src="{{ asset('/home/Descrição - Cardápio (1).png') }}"
                alt="Imagem do Cardápio">
            <a href="{{ route('cardapio') }}"
                class="absolute left-1/2 top-[650px] transform -translate-x-1/2 -translate-y-1/2 bg-gray-800 text-white px-5 py-3 inline-block text-sm cursor-pointer rounded-full hover:bg-cafune">
                CONHEÇA O CARDÁPIO
            </a>
        </div>

    </div>

    <div class="relative w-full">
        <img class="w-full block" src="{{ asset('/home/Banner 2.png') }}" alt="Banner">
        <a href="{{ route('sobre-nos') }}"
            class="absolute left-1/2 top-[450px] transform -translate-x-1/2 -translate-y-1/2 bg-gray-800 text-white px-10 py-3 inline-block text-sm cursor-pointer border-none rounded-full hover:bg-cafune">
            SOBRE NÓS
        </a>
    </div>

    <div class="flex items-center justify-center mt-12 p-5 mb-20">
        <img class="max-w-full" src="{{ asset('/home/sonho-caneca.png') }}" alt="Imagem promocional da Cafuné">
        <div class="ml-5">
            <p class="text-lg p-2">
                Você sabia que a Cafuné oferece diversas <br> promoções por aqui? <br>
                Cadastre-se e receba as novidades!
            </p>
            <a class="bg-gray-800 text-white px-5 py-3 inline-block text-sm cursor-pointer rounded-full hover:bg-cafune"
                href="{{ route('register') }}">JUNTE-SE A NÓS!</a>
        </div>
    </div>


</x-app-layout>
