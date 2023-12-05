<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cafuné Pâtisserie</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /*.banner-video {
            position: relative;
            width: 100%;
            height: 70vh;
            overflow: hidden;
            margin-bottom: auto;
        } 

        .banner-video video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        } 


        .imagem-container {
            display: flex;
            justify-content: center; 
            align-items: center; 
            flex-wrap: wrap;  
            margin-top: 50px;
        }

        .imagem-container img {
            padding: 10px;
            max-width: 100%; 
            margin-bottom: 60px; 
        } 


        .overlay-button {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #2C2B4C;
            color: white;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            cursor: pointer;
            border: none;
            border-radius: 20px;
        }

        .overlay-button:hover {
            background-color: #8190A0;
        }

        .banner{
            position: relative;
            width: 100%;
        }

        .banner img{
            width: 100%;
            height: 500px;
            display: block;
        }

        .overlay-button2 {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #2C2B4C;
            color: white;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            cursor: pointer;
            border: none;
            border-radius: 20px;
        }

        .overlay-button2:hover {
            background-color: #8190A0;
        }

        */




        
    </style>

</head>

<body class="antialiased">
    @include('layouts.navigation')

    <div class="container">

    <!--
        <div class="relative w-full overflow-hidden mb-auto sm:h-[60vh] -mt-px">
            <video class="w-full h-full object-cover opacity-80"  autoplay muted loop>
                <source src="{{asset('/home/video.mp4')}}" type="video/mp4">
                <div clss="content"></div>
            </video>
            <div class="font-aurore absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <p class="text-[#a6511f] text-center text-xl md:text-4xl">Cafuné, o sabor do carinho</p>
        </div>
        </div>
    -->
    <div class="relative w-full overflow-hidden mb-auto sm:h-[60vh] -mt-px">
    <div class="absolute w-full h-full bg-black opacity-60"></div>
    <video class="w-full h-full object-cover" autoplay muted loop>
        <source src="{{asset('/home/video.mp4')}}" type="video/mp4">
    </video>

    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <p class="font-aurore text-transparent text-center text-3xl md:text-4xl" style="text-shadow: 0 0 0px #FFF, 0 0 3px #FFF, 0 0 0px #FFF, 0 0 15px #000, 0 0 20px #000, 0 0 25px #000;">
            Cafuné, o sabor do carinho
        </p>
    </div>
</div>

        
        
        <div class="flex justify-center items-center flex-wrap mt-[50px]">
            <img class="p-[10px] max-w-full mb-[60px]" src="{{asset('/home/Destaque 1.png')}}" alt="">
            <img class="p-[10px] max-w-full mb-[60px]" src="{{asset('/home/Destaque 2.png')}}" alt="">
            <div class="relative">
                <img class="p-[10px] max-w-full mb-[60px]" src="{{asset('/home/Descrição - Cardápio (1).png')}}" alt="">
                <a href="{{ route('cardapio') }}" class="absolute left-2/4 top-[650px] transform -translate-x-1/2 -translate-y-1/2 bg-[#2C2B4C] text-[white] px-[20px] py-[15px] no-underline inline-block text-[15px] cursor-pointer border-[none] rounded-[20px] hover:bg-cafune">CONHEÇA O CARDÁPIO</a>
            </div>
        </div>

        <div class="relative w-full">
            <img class="w-full block" src="{{asset('/home/Banner 2.png')}}" alt="">
            <a href="{{ route('sobre-nos') }}" class="absolute left-2/4 top-[450px] transform -translate-x-1/2 -translate-y-1/2 bg-[#2C2B4C] text-[white] px-[40px] py-[15px] no-underline inline-block text-[15px] cursor-pointer border-[none] rounded-[20px] hover:bg-cafune">SOBRE NÓS</a>
        </div>

        <div class="flex items-center justify-center mt-[50px] p-[20px] mb-20">
            <img class="max-w-full" src="{{asset('/home/sonho-caneca.png')}}" alt="">
            <div>
                <p class="text-[23px] p-[10px]">Você sabia que a Cafuné oferece diversas <br> promoções por aqui? <br>
                Cadastre-se e receba as novidades!</p>
                <a class="bg-[#2C2B4C] text-[white] px-[20px] py-[15px] no-underline inline-block text-[15px] cursor-pointer border-[none] rounded-[20px] hover:bg-cafune" href="{{ route('register') }}">JUNTE-SE A NÓS!</a>
            </div>
        </div>
        
       


    </div>
    
    


    @include('layouts.footer')


</body>

</html>