<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista() {
        $itens = \Cart::getContent();
        return view('products.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request) {
        
        // dd($request->all());

        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->qnt,
        ]);

        return redirect()->route('exibircarrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso');

    }

    public function removeCarrinho(Request $request) {
        \Cart::remove($request->id);
        return redirect()->route('exibircarrinho')->with('sucesso', 'Produto removido do carrinho');

    }

    public function atualizaCarrinho(Request $request) {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ]
        ]);
        return redirect()->route('exibircarrinho')->with('sucesso', 'Produto atualizado');
    }
}
