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
        /* Comentario aleatorio para testar commit */

        body {
        font-family: 'La Belle Aurore', serif; /* Substitua 'SuaFonte' pela fonte que desejar */
        background: #ffffff; /* Cor de fundo da página */
        color: #333; /* Cor padrão do texto */
        }

        #slogan {
    font-family: 'La Belle Aurore', cursive; 
    color: #000;
    text-align: center; /* Alinha o texto ao centro */
    margin: 50px 40px; /* Margens superior e inferior fixas, esquerda e direita automáticas */
    max-width: 80%; /* Ajuste a largura máxima conforme necessário */
    }

    /* Se você deseja usar flexbox para centralizar */
    #slogan-container {
    display: flex;
    justify-content: center; /* Alinha horizontalmente ao centro */
    align-items: center; /* Alinha verticalmente ao centro */
    }

    h1 {
    font-size: 2.5rem;
    color: #000;
    }

        /* Estilo dos parágrafos */
        p {
        margin-bottom: 3px; /* Espaço abaixo dos parágrafos */
        color: #555; /* Cor do texto dos parágrafos */
        }

        /* Estilo das imagens */
        img {
        max-width: 80%; /* Faz as imagens serem responsivas */
        height: 300px; /* Mantém a proporção das imagens */
        }

        /* Estilo das seções */
        section {
        margin-bottom: 20px; /* Espaço abaixo das seções */
        }

        .sobre{
            margin-left: 250px;
            margin-right: 250px;
            font-size: 20px;
            margin-top: 50px;
        }

       /* Estilo específico para a fundadora */
       .fundadora {
    display: flex;
    justify-content: center; /* Alinha horizontalmente ao centro */
    align-items: center; /* Alinha verticalmente ao centro */
    background: #f8f8f8; /* Cor de fundo */
    padding: 10px;
    border: 1px solid #ddd; /* Borda externa */
}

.texto-fundadora {
    flex: 1; /* O texto ocupa o espaço disponível */
    text-align: justify; /* Justifica o texto */
    padding: 20px; /* Espaço interno */
    font-family: 'Lateef', serif;
    font-size: 18px;
    /* Removido min-width e border-right */
}

.fundadora img {
    max-width: 100%; /* Permite que a imagem cresça até 100% de seu container */
    height: auto; /* Mantém a proporção da imagem */
    padding: 10px; /* Espaço interno */
    /* Removido flex, min-width e max-width */
}

/* Responde ao tamanho da tela */
@media (max-width: 768px) {
    .fundadora {
        flex-direction: column;
    }

    .texto-fundadora {
        text-align: center; /* Centraliza o texto em telas pequenas */
        padding: 10px; /* Espaço interno ajustado para telas pequenas */
        /* Removido border-right */
    }

    .fundadora img {
        max-width: 100%; /* A imagem ocupa 100% da largura em telas pequenas */
        margin-top: 20px; /* Espaço acima da imagem em telas pequenas */
    }
}

.cafuné-intro {
    max-width: 800px; /* Largura máxima para a seção */
    padding: 40px 20px; /* Padding para não colar no lado da tela */
    text-align: center; /* Adiciona esta linha para centralizar o conteúdo */
}

.cafuné-image {
    max-width: 100%; /* Faz a imagem responsiva */
    margin-bottom: 10px; /* Espaço entre a imagem e o texto */
    display: inline-block; /* Permite que a imagem seja centralizada */
}


.cafuné-text {
    font-size: 20px; /* Tamanho do texto */
    margin-bottom: 20px; /* Espaço entre o texto e a legenda */
    margin-left: auto;
}

.cafuné-caption {
    font-size: 14px; /* Tamanho da legenda */
    margin-bottom: 60px;
    font-family: 'Lateef', serif;
    color: #707070; /* Cor da legenda */
}

    </style>
       
    </head>
    <body class="antialiased">
        @include('layouts.navigation')

        
        <div id="slogan-container">
    <div id="slogan">
        <h1>Cafuné, le goût de l'affection</h1>
    </div>
</div>

    <section class="sobre">
        <p>Bem-vindo à Cafuné Pâtisserie, onde cada doce conta uma história de carinho e sabor. Fundada com paixão e tradição, a Cafuné é mais do que uma simples padaria, é um refúgio de afeto onde os aromas da França se encontram com a calorosa hospitalidade brasileira!</p>
    </section>

    <section class="fundadora">
    <div class="texto-fundadora">
        <p>Nossa fundadora, Margot Blanc, nascida em Paris, trouxe consigo não apenas receitas tradicionais, <br> mas também a essência da cidade do amor. Apaixonada pela arte da pâtisserie desde jovem, ela veio ao Brasil, <br> onde decidiu criar a Cafuné, uma padaria de alto padrão.</p>
        <p>Essa grande mulher tornou seu sonho realidade e trouxe um lugar com experiência única para os brasileiros.</p>
    </div>
    <img src="{{ asset('/images/Criadora.png') }}" alt="Margot Blanc">
</section>


    <section class="sobre">
        <p>Queremos que cada visita à Cafuné seja como um abraço caloroso. Nosso ambiente foi projetado para oferecer não apenas deliciosas opções de pâtisserie, mas também um espaço onde os clientes se sintam em casa.</p>
    </section>

    <section class="cafuné-intro">
        <img src="{{ asset('/images/Retrô.png') }}" alt="A primeira loja Cafuné do Brasil - 1963" class="cafuné-image">
        <p class="cafuné-caption">
            A primeira loja Cafuné do Brasil - 1963
    </p>

    </section>
    <section class="sobre">
            Na Cafuné, acreditamos que a boa comida tem o poder de unir as pessoas. Estamos aqui para compartilhar um pedacinho da França, um sorriso acolhedor e, é claro, muitos doces momentos com você. Seja bem-vindo à nossa casa, a Cafuné Pâtisserie.
        </section>
        
    
    </body>
</html>