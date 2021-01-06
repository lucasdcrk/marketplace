<?php

namespace App\Http\Controllers;

class OrdersController extends Controller
{
    public function __invoke()
    {
        $orders = auth()->user()->orders()->orderBy('id', 'desc')->get();

        return view('orders')
            ->with('orders', $orders);
    }
}
