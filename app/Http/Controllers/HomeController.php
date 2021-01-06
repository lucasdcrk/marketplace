<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $products = Product::inRandomOrder()->limit(6)->get();
        $sellers = Seller::inRandomOrder()->limit(3)->get();

        return view('home')
            ->with('products', $products)
            ->with('sellers', $sellers);
    }
}
