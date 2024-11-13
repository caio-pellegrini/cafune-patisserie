<x-app-layout>

    <x-slot name="title">Sobre nós | Cafuné</x-slot>

    <div class="font-aurore bg-white">

        <div class="flex justify-center items-center py-12 px-10">
            <div class="text-black text-center">
                <h1 class="text-2xl md:text-4xl lg:text-5xl mt-10">
                    Cafuné, le goût de l'affection
                </h1>
            </div>
        </div>

        <section class="mx-8 sm:mx-64 text-xl mt-8">
            <p class="mb-1 text-gray-600">
                Bem-vindo à Cafuné Pâtisserie, onde cada doce conta uma história de carinho e sabor. Fundada com paixão
                e tradição, a Cafuné é mais do que uma simples padaria, é um refúgio de afeto onde os aromas da França
                se encontram com a calorosa hospitalidade brasileira!
            </p>
        </section>


        <section
            class="flex items-center justify-center flex-wrap text-center max-w-3xl mx-auto my-0 bg-gray-100 p-4 border border-gray-300 mt-12 mb-12">
            <div class="flex-1 text-justify p-5 font-serif text-base">
                <p class="mb-1 text-gray-600">
                    Nossa fundadora, Margot Blanc, nascida em Paris, trouxe consigo não apenas receitas tradicionais,
                    mas também a essência da cidade do amor. Apaixonada pela arte da pâtisserie desde jovem, ela veio ao
                    Brasil, onde decidiu criar a Cafuné, uma padaria de alto padrão.
                </p>
                <p class="mb-1 text-gray-600">
                    Essa grande mulher tornou seu sonho realidade e trouxe um lugar com experiência única para os
                    brasileiros.
                </p>
            </div>
            <img class="max-w-full h-auto p-4 transition-transform transform hover:scale-110"
                src="{{ asset('/images/Criadora.png') }}" alt="Margot Blanc">
        </section>



        <section class="mx-8 sm:mx-64 text-xl mt-8">
            <p class="mb-1 text-gray-600">
                Queremos que cada visita à Cafuné seja como um abraço caloroso. Nosso ambiente foi projetado para
                oferecer não apenas deliciosas opções de pâtisserie, mas também um espaço onde os clientes se sintam em
                casa.
            </p>
        </section>


        <section class="max-w-2xl mx-auto my-0 px-5 py-10 text-center">
            <img class="w-4/5 h-[300px] max-w-full block mx-auto my-0 transition-transform transform hover:scale-105"
                src="{{ asset('/images/Retrô.png') }}" alt="A primeira loja Cafuné do Brasil - 1963">
            <p class="text-sm mt-2 font-serif text-gray-500">
                A primeira loja Cafuné do Brasil - 1963
            </p>
        </section>


        <section class="mx-8 sm:mx-64 text-lg mt-8">
            Na Cafuné, acreditamos que a boa comida tem o poder de unir as pessoas. Estamos aqui para compartilhar um
            pedacinho da França, um sorriso acolhedor e, é claro, muitos doces momentos com você. Seja bem-vindo à nossa
            casa, a Cafuné Pâtisserie.
        </section>

        <hr>

        <h3 class="mt-8 text-3xl text-center">Lojas Atuais</h3>

        <section class="flex justify-center items-center flex-wrap mt-5 mb-20">
            <img class="h-80 max-w-1/3 m-2 transition-transform transform hover:scale-105 cursor-pointer"
                src="{{ asset('/images/Fachada 1.png') }}" alt="Imagem da Fachada 1">
            <img class="h-80 max-w-1/3 m-2 transition-transform transform hover:scale-105 cursor-pointer"
                src="{{ asset('/images/Fachada 2.png') }}" alt="Imagem da Fachada 2">
            <img class="h-80 max-w-1/3 m-2 transition-transform transform hover:scale-105 cursor-pointer"
                src="{{ asset('/images/Fachada 3.png') }}" alt="Imagem da Fachada 3">
        </section>

    </div>

</x-app-layout>
