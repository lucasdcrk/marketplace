<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view()
    {
        return view('cart');
    }

    public function addToCart(Product $product, Request $request)
    {
        $session = $request->session();

        $session->push('cart.products', $product->id);

        $total = $session->get('cart.total', 0);
        $session->put('cart.total', $total + $product->price);

        $session->flash('alert', 'Article ajouté au panier.');

        return redirect()->back();
    }

    public function removeFromCart(Product $product, Request $request)
    {
        $session = $request->session();


        return redirect()->back();
    }

    public function emptyCart(Request $request)
    {
        $session = $request->session();

        $session->forget('cart');

        $session->flash('alert', 'Panier vidé.');

        return redirect()->back();
    }
}
