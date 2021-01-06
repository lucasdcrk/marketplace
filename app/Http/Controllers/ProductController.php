<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user()->type === 'seller', 403);

        $seller = Seller::where('id', auth()->user()->id)->first();
        $products = $seller->products;

        return view('products.index')
            ->with('products', $products);
    }

    public function create()
    {
        abort_unless(auth()->user()->type === 'seller', 403);

        return view('products.create');
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user()->type === 'seller', 403);

        $seller = Seller::where('id', auth()->user()->id)->first();

        $product = $seller->products()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => ''
        ]);
        $product->save();

        return redirect(route('article.index'));
    }

    public function show(Product $product)
    {
        return view('products.show')
            ->with('product', $product);
    }

    public function destroy($id)
    {
        $seller = Seller::where('id', auth()->user()->id)->first();

        abort_unless($seller->id === auth()->user()->id, 403);

        $product = Product::find($id);
        $product->delete();

        return redirect()->back();
    }
}
