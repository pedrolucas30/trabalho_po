<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;

class ProdutoController extends Controller
{
    public function index()
    {
        try {
            $products = Product::query()->latest()->get();
        } catch (Throwable) {
            $products = collect();
        }

        return view('welcome', compact('products'));
    }
}
