<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $articles = Article::findMany(array_keys($cart));

        return view('panier.index', compact('articles', 'cart'));
    }

    public function add($id)
    {
        $cart = session()->get('cart', []);
        $cart[$id] = ($cart[$id] ?? 0) + 1;

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Article ajouté au panier');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Article retiré du panier');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Panier vidé');
    }
}
