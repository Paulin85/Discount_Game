<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



use App\Product;

class CartController extends Controller
{
    

    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->product_id;
        });

        if ($duplicata->isNotEmpty()){
            return redirect()->route('products.index')->with('success', 'Le produit a déjà été ajouté !');
        }

        $product = Product::find($request->product_id);

        Cart::add($product->id, $product->name, 1, $product->price)
            ->associate('App\Product');

            return redirect()->route('products.index')->with('success', 'Le produit a bien été ajouté !');
    }


    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return back()->with('succcess', 'Le produit a été supprimé !');
    }

    public function update(Request $request, $rowId)
    {
        $data = $request->json()->all();

        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|between:1,6'
        ]);

        if($validator->fails()) {
            Session::flash('danger', 'La quantité du produit ne peut pas être supérieur à 6.');
            return response()->json(['error' => 'Cart Quantity Has Not Been Updated']);
        };

        Cart::update($rowId, $data['qty']);

        Session::flash('success', 'La quantité du produit est passé à ' . $data['qty'] . '.');

        return response()->json(['success' => 'Cart Quantity Has Been Updated']);
    }

    
}
