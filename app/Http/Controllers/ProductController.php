<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $products = Product::all(); // Obtém todos os produtos
        return view('cardapio', compact('products', 'categories')); // Retorna a view com os produtos
    }

    public function show($id)
    {
        
        $product = Product::findOrFail($id); // Encontra o produto ou falha com erro 404
        //$type = gettype($product->price);
        //dd($type);
        return view('products.show', compact('product')); // Retorna a view com o produto específico
    }
}
