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

        <div class="relative w-full overflow-hidden mb-auto sm:h-[60vh]">
            <video class="w-full h-full object-cover" autoplay muted loop>
                <source src="{{asset('/home/video.mp4')}}" type="video/mp4">
                <div clss="content"></div>
            </video>
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

        <div class="flex items-center justify-center mt-[50px] p-[20px]">
            <img class="max-w-full" src="{{asset('/home/sonho+caneca.png')}}" alt="">
            <div>
                <p class="text-[23px] p-[10px]">Você sabia que a Cafuné oferece diversas <br> promoções por aqui? <br>
                Cadastre-se e receba as novidades!</p>
                <a class="bg-[#2C2B4C] text-[white] px-[20px] py-[15px] no-underline inline-block text-[15px] cursor-pointer border-[none] rounded-[20px] hover:bg-cafune" href="{{ route('register') }}">JUNTE-SE A NÓS!</a>
            </div>
        </div>
        
       


    </div>
    
    


    <footer class="bg-gray-400 text-white py-4">
        <div class="max-w-6xl mx-auto px-4 flex flex-wrap justify-between items-center">
            

            <div class="w-full md:w-1/3 mb-4 md:mb-0">
                <p>(45) 93730-3718</p>
                <p>cafune@patisserie.com.br</p>
                <p>@cafunebr</p>
            </div>

            
            <div class="w-full md:w-1/3 mb-4 md:mb-0 flex justify-center md:justify-center">
                <a href="/">
                    <x-application-logo class="w-48 h-48 fill-white text-gray-500" />
                </a>
            </div>

            
            <div class="w-full md:w-1/3 mb-4 md:mb-0 text-right">
                <a target="_blank" class="hover:text-blue-900" href="https://www.google.com/maps/dir//Av.+Sete+de+Setembro,+1695+-+Alto+da+XV,+Curitiba+-+PR,+80060-070/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x94dce4450e30585f:0x29b40cfe93eeef8e?sa=X&ved=2ahUKEwig-6_Th-eCAxUbtJUCHdhUCzoQwwV6BAgLEAA">
                    <p>Av. Sete De Setembro, 1695</p>
                    <p>Alto Da XV</p>
                    <p>Curitiba - PR, 80060-070</p>
                </a>

                <div class="flex justify-end mt-2">
            
                    
                    <a target="_blank" href="https://www.instagram.com/" class="text-white ml-2">
                        <svg class="svg-icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 384a128 128 0 1 0 0 256 128 128 0 0 0 0-256z m0-85.333333a213.333333 213.333333 0 1 1 0 426.666666 213.333333 213.333333 0 0 1 0-426.666666z m277.333333-10.666667a53.333333 53.333333 0 0 1-106.666666 0 53.333333 53.333333 0 0 1 106.666666 0zM512 170.666667c-105.557333 0-122.794667 0.298667-171.904 2.474666-33.450667 1.578667-55.893333 6.058667-76.714667 14.165334a123.136 123.136 0 0 0-46.08 29.994666 123.306667 123.306667 0 0 0-30.037333 46.08c-8.106667 20.906667-12.586667 43.306667-14.122667 76.714667C170.922667 387.2 170.666667 403.669333 170.666667 512c0 105.557333 0.298667 122.794667 2.474666 171.904 1.578667 33.408 6.058667 55.893333 14.122667 76.672 7.253333 18.56 15.786667 31.914667 29.952 46.08 14.378667 14.336 27.733333 22.912 46.08 29.994667 21.077333 8.149333 43.52 12.672 76.8 14.208C387.2 853.077333 403.669333 853.333333 512 853.333333c105.557333 0 122.794667-0.298667 171.904-2.474666 33.365333-1.578667 55.850667-6.058667 76.672-14.122667a124.586667 124.586667 0 0 0 46.08-29.952c14.378667-14.378667 22.954667-27.733333 30.037333-46.08 8.106667-21.034667 12.629333-43.52 14.165334-76.8 2.218667-47.104 2.474667-63.573333 2.474666-171.904 0-105.557333-0.298667-122.794667-2.474666-171.904-1.578667-33.365333-6.058667-55.893333-14.165334-76.714667a124.202667 124.202667 0 0 0-29.994666-46.08 123.050667 123.050667 0 0 0-46.08-30.037333c-20.906667-8.106667-43.349333-12.586667-76.714667-14.122667C636.8 170.922667 620.330667 170.666667 512 170.666667z m0-85.333334c115.925333 0 130.389333 0.426667 175.872 2.56 45.44 2.133333 76.373333 9.258667 103.594667 19.84 28.16 10.837333 51.882667 25.514667 75.605333 49.194667a209.408 209.408 0 0 1 49.194667 75.605333c10.538667 27.178667 17.706667 58.154667 19.84 103.594667 2.005333 45.482667 2.56 59.946667 2.56 175.872 0 115.925333-0.426667 130.389333-2.56 175.872-2.133333 45.44-9.301333 76.373333-19.84 103.594667a208.341333 208.341333 0 0 1-49.194667 75.605333 209.706667 209.706667 0 0 1-75.605333 49.194667c-27.178667 10.538667-58.154667 17.706667-103.594667 19.84-45.482667 2.005333-59.946667 2.56-175.872 2.56-115.925333 0-130.389333-0.426667-175.872-2.56-45.44-2.133333-76.373333-9.301333-103.594667-19.84a208.64 208.64 0 0 1-75.605333-49.194667 209.237333 209.237333 0 0 1-49.194667-75.605333c-10.581333-27.178667-17.706667-58.154667-19.84-103.594667C85.888 642.389333 85.333333 627.925333 85.333333 512c0-115.925333 0.426667-130.389333 2.56-175.872 2.133333-45.482667 9.258667-76.373333 19.84-103.594667a208.213333 208.213333 0 0 1 49.194667-75.605333A208.938667 208.938667 0 0 1 232.533333 107.733333c27.221333-10.581333 58.112-17.706667 103.594667-19.84C381.610667 85.888 396.074667 85.333333 512 85.333333z" />
                        </svg>
                    </a>
                    <a target="_blank" href="mailto:cafunepatisserie@gmail.com" class="text-white ml-2">
                        <svg class="svg-icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M33.072 160c6.4 0.672 12.816 1.216 19.2 1.216 306.48 0.192 612.96 0.192 919.44 0 6.384 0 12.784-0.544 19.2-1.216C1000.896 163.824 1008 173.488 1008 184.832l0 2.768c-13.76 9.328-28.864 17.104-41.04 28.16-124.736 113.488-249.072 227.408-373.392 341.36-60.016 55.024-102.848 55.072-163.072-0.08-123.488-113.04-246.896-226.16-370.768-338.768C46.656 206.368 32 197.744 16 187.584l0-2.768C16 173.488 23.088 163.824 33.072 160" />
                            <path d="M309.008 560.144c17.472-15.36 30.336-15.216 46.288 1.856 15.824 16.928 34.064 31.6 51.504 46.992 68.064 59.92 143.104 59.648 211.232-0.784 22.768-20.192 45.312-40.608 70.8-63.488 70.048 57.936 138.432 114.896 207.312 171.264C932.992 746.144 976 775.264 1008 804.848l0 39.504C1008 859.072 996.08 864 981.36 864L42.64 864C27.92 864 16 859.072 16 844.352l0-46.848c61.072-48.496 122.352-96.704 183.104-145.6C236.272 621.968 273.2 591.648 309.008 560.144" />
                            <path d="M1008 256l0 482.704c-91.616-76.384-183.216-152.768-278.752-232.448C825.264 419.28 916.624 337.648 1008 254.864" />
                            <path d="M16 720 16 253.744c91.168 82.608 182.32 165.232 276.528 250.608C197.2 582.608 106.608 651.312 16 725.68" />
                        </svg>
                    </a>
                    <a target="_blank" href="https://www.facebook.com/" class="text-white ml-2 -mr-0.5">
                        <svg class="svg-icon" style="width: 1em;height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M554.666667 850.688A341.376 341.376 0 0 0 512 170.666667a341.333333 341.333333 0 0 0-42.666667 680.021333V597.333333H384v-85.333333h85.333333v-70.570667c0-57.045333 5.973333-77.738667 17.066667-98.602666A116.309333 116.309333 0 0 1 534.869333 294.4c16.298667-8.746667 36.565333-13.994667 71.978667-16.256 14.037333-0.896 32.213333 0.213333 54.528 3.413333v81.066667H640c-39.125333 0-55.296 1.834667-64.938667 6.997333a31.018667 31.018667 0 0 0-13.397333 13.397334c-5.12 9.642667-6.997333 19.2-6.997333 58.368V512h106.666666l-21.333333 85.333333h-85.333333v253.354667zM512 938.666667C276.352 938.666667 85.333333 747.648 85.333333 512S276.352 85.333333 512 85.333333s426.666667 191.018667 426.666667 426.666667-191.018667 426.666667-426.666667 426.666667z" />
                        </svg>
                    </a>
                    <a target="_blank" href="http://www.tiktok.com/" class="text-white ml-2 mt-0.5">
                        <svg class="h-6 w-6 text-white" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#ffffff">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">

                                <path d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z" />

                            </g>

                        </svg>
                    </a>
                    <a target="_blank" href="tel:+45937303718" class="text-white -ml-1.5 -mt-0.2">
                        <svg class="svg image" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M789.85475 713.420429c-56.890708-21.75549-110.774943-49.748031-173.238576 8.559956-38.553061 35.985586-66.429968 32.04688-91.638093 18.648732C499.786329 727.233016 344.582501 568.779168 323.393923 516.943592c-21.186532-51.835575-9.742898-58.84113 0-74.553996 9.728572-15.735379 77.310783-52.43728 36.652781-167.765935-40.672328-115.331725-72.604598-202.183815-238.250242 0-17.183358 20.969591 0 111.843274 0 111.843274s116.799146 381.794519 513.137916 540.566616C696.461687 951.674765 835.415412 912.650983 891.505895 815.18823 918.999063 767.42439 879.124913 747.554854 789.85475 713.420429z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center py-2 border-t border-gray-700 mt-4">
            <p>© 2023 | Todos Os Direitos Reservados.</p>
            <!-- Logo da empresa desenvolvedora -->
            <img src="{{ asset('/images/logo-wisetech.png') }}" alt="WISETECH" class="h-11 mx-auto justify-center">
        </div>
    </footer>


</body>

</html>