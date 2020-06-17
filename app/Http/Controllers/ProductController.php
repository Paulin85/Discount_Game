<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {    
        $products = Product::orderBy('created_at', 'DESC')->paginate(8);
        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $stock = $product->stock === 0 ? 'Indisponible' : 'Disponible';

        return view('products.show', [
            'product' => $product,
            'stock' => $stock
        ]);
    }

    public function search()
    {
        $q = request()->input('q');

        $products  = Product::where('name', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->paginate(8);

        return view('products.search')->with('products', $products);
    }

}
