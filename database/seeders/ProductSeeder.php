<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['category_id' => 1, 'name' => 'Pão Francês', 'description' => '', 'price' => 1.00, 'unit_of_measure' => 'un', 'product_image' => '/products/pao_frances.png'],
            ['category_id' => 1, 'name' => 'Baguete', 'description' => '', 'price' => 5.00, 'unit_of_measure' => 'un', 'product_image' => '/products/baguete.png'],
            ['category_id' => 1, 'name' => 'Pão de Queijo', 'description' => '', 'price' => 4.00, 'unit_of_measure' => 'un', 'product_image' => '/products/pao_de_queijo.png'],
            ['category_id' => 1, 'name' => 'Pão Doce', 'description' => '', 'price' => 4.00, 'unit_of_measure' => 'un', 'product_image' => '/products/pao_doce.png'],
            ['category_id' => 1, 'name' => 'Pão de Banana', 'description' => '', 'price' => 20.00, 'unit_of_measure' => 'un', 'product_image' => '/products/pao_de_banana.png'],
            ['category_id' => 1, 'name' => 'Pão Integral', 'description' => '', 'price' => 17.90, 'unit_of_measure' => 'un', 'product_image' => '/products/pao_integral.png'],
            ['category_id' => 1, 'name' => 'Brioche', 'description' => '', 'price' => 5.00, 'unit_of_measure' => 'un', 'product_image' => '/products/brioche.png'],
            ['category_id' => 1, 'name' => 'Bolacha Caseira', 'description' => 'Chocolate ou Baunilha', 'price' => 1.90, 'unit_of_measure' => 'un', 'product_image' => '/products/bolacha_caseira.png'],
            ['category_id' => 1, 'name' => 'Muffin de Blueberrys', 'description' => '', 'price' => 7.00, 'unit_of_measure' => 'un', 'product_image' => '/products/muffin.png'],
            ['category_id' => 1, 'name' => 'Pão de Leite', 'description' => '', 'price' => 1.70, 'unit_of_measure' => 'un', 'product_image' => '/products/pao_de_leite.png'],
            ['category_id' => 1, 'name' => 'Cafuné', 'description' => 'Moda da Casa', 'price' => 30.00, 'unit_of_measure' => 'un', 'product_image' => '/products/cafune.png'],
            ['category_id' => 1, 'name' => 'Pão Vegano', 'description' => '', 'price' => 18.90, 'unit_of_measure' => 'un', 'product_image' => '/products/pao_vegano.png'],
            ['category_id' => 2, 'name' => 'Água', 'description' => '', 'price' => 5.50, 'unit_of_measure' => '310ml', 'product_image' => '/products/agua.png'],
            ['category_id' => 2, 'name' => 'Suco Natural', 'description' => '', 'price' => 10.00, 'unit_of_measure' => '350ml', 'product_image' => '/products/suco_natural.png'],
            ['category_id' => 3, 'name' => 'Expresso', 'description' => 'Americano', 'price' => 3.50, 'unit_of_measure' => '30ml', 'product_image' => '/products/expresso.png'],
            ['category_id' => 3, 'name' => 'Macchiato', 'description' => '', 'price' => 8.00, 'unit_of_measure' => '150ml', 'product_image' => '/products/macchiato.png'],
            ['category_id' => 3, 'name' => 'Café com Leite', 'description' => '', 'price' => 6.00, 'unit_of_measure' => '150ml', 'product_image' => '/products/cafe_com_leite.png'],
            ['category_id' => 3, 'name' => 'Cappuccino Chamego', 'description' => '', 'price' => 15.50, 'unit_of_measure' => '200ml', 'product_image' => '/products/cappuccino_chamego.png'],
            ['category_id' => 3, 'name' => 'Mocaccino Meiguice', 'description' => '', 'price' => 10.00, 'unit_of_measure' => '150ml', 'product_image' => '/products/mocaccino_meiguice.png'],
            ['category_id' => 3, 'name' => 'Café Gelado', 'description' => '', 'price' => 4.00, 'unit_of_measure' => '150ml', 'product_image' => '/products/cafe_gelado.png'],
            ['category_id' => 3, 'name' => 'Latte Conforto', 'description' => 'Latte de baunilha com caramelo bruleé', 'price' => 16.70, 'unit_of_measure' => '150ml', 'product_image' => '/products/latte_conforto.png'],
            ['category_id' => 3, 'name' => 'Frappucino Beijoca', 'description' => 'Frappuccino de creme de morango', 'price' => 16.70, 'unit_of_measure' => '200ml', 'product_image' => '/products/frappucino_beijoca.png'],
            ['category_id' => 4, 'name' => 'Chá Preto com Limão', 'description' => '', 'price' => 5.00, 'unit_of_measure' => '80ml', 'product_image' => '/products/cha_preto.png'],
            ['category_id' => 4, 'name' => 'Chá Matcha', 'description' => '', 'price' => 6.00, 'unit_of_measure' => '80ml', 'product_image' => '/products/cha_matcha.png'],
            ['category_id' => 4, 'name' => 'Chá Gelado', 'description' => '', 'price' => 5.00, 'unit_of_measure' => '80ml', 'product_image' => '/products/cha_gelado.png'],
            ['category_id' => 5, 'name' => 'Afago', 'description' => 'Pão ciabatta, tomate, provolone e molho pesto', 'price' => 22.00, 'unit_of_measure' => 'un', 'product_image' => '/products/afago.png'],
            ['category_id' => 5, 'name' => 'Croissant à Caprese', 'description' => 'Croissant com tomate, muçarela de búfala e manjericão', 'price' => 21.00, 'unit_of_measure' => 'un', 'product_image' => '/products/croissant_caprese.png'],
            ['category_id' => 5, 'name' => 'Ternura', 'description' => 'Baguete com presunto de parma e burrata', 'price' => 24.00, 'unit_of_measure' => 'un', 'product_image' => '/products/ternura.png'],
            ['category_id' => 6, 'name' => 'Abraço', 'description' => 'Torta de limão siciliano', 'price' => 45.00, 'unit_of_measure' => 'un', 'product_image' => '/products/abraco.png'],
            ['category_id' => 6, 'name' => 'Mimo', 'description' => 'Torta de morango', 'price' => 45.00, 'unit_of_measure' => 'un', 'product_image' => '/products/mimo.png'],
            ['category_id' => 6, 'name' => 'Agrado', 'description' => 'Torta de floresta negra (cereja e chocolate)', 'price' => 45.00, 'unit_of_measure' => 'un', 'product_image' => '/products/agrado.png'],
            ['category_id' => 7, 'name' => 'Bombom de Morango', 'description' => '', 'price' => 6.50, 'unit_of_measure' => 'un', 'product_image' => '/products/bombom_de_morango.png'],
            ['category_id' => 7, 'name' => 'Bomba de Chocolate', 'description' => '', 'price' => 7.00, 'unit_of_measure' => 'un', 'product_image' => '/products/bomba_de_chocolate.png'],
            ['category_id' => 7, 'name' => 'Sonho', 'description' => '', 'price' => 8.00, 'unit_of_measure' => 'un', 'product_image' => '/products/sonho.png'],
            ['category_id' => 7, 'name' => 'Rosca Doce', 'description' => '', 'price' => 6.00, 'unit_of_measure' => 'un', 'product_image' => '/products/rosca_doce.png'],
            ['category_id' => 7, 'name' => 'Croissant Recheado', 'description' => '', 'price' => 15.00, 'unit_of_measure' => 'un', 'product_image' => '/products/croissant_recheado.png'],
            ['category_id' => 7, 'name' => 'Quindim', 'description' => '', 'price' => 10.00, 'unit_of_measure' => 'un', 'product_image' => '/products/quindim.png'],
            ['category_id' => 7, 'name' => 'Panetone', 'description' => '', 'price' => 25.90, 'unit_of_measure' => 'un', 'product_image' => '/products/panetone.png'],
            ['category_id' => 7, 'name' => 'Cannoli Recheado', 'description' => '', 'price' => 15.00, 'unit_of_measure' => 'un', 'product_image' => '/products/cannoli_recheado.png'],
        ]);
    }
}
