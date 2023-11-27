<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = \Cart::getContent();
        return view('products.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request)
    {

        // dd($request->all());

        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => [
                'unit_of_measure' => $request->unit,
                'image' => $request->img
            ]
        ]);

        return redirect()->route('exibircarrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso');
    }

    public function removeCarrinho(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('exibircarrinho')->with('sucesso', 'Produto removido do carrinho');
    }

    public function atualizaCarrinho(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ]
        ]);
        return redirect()->route('exibircarrinho')->with('sucesso', 'Produto atualizado');
    }

    public function limpaCarrinho()
    {
        \Cart::clear();
        return redirect()->route('exibircarrinho')->with('aviso', 'Seu carrinho está vazio');
    }
}
