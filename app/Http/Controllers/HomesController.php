<?php

namespace App\Http\Controllers;

use App\Filters\DogFilter;
use App\Models\Dog;
use App\Models\Home;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function index (DogFilter $dogFilter, Dog $dog)
    {
            $dogs = Dog::query ()
                ->filter($dogFilter)
                ->paginate (6);
            return view ('content', ['dogs' => $dogs]);
    }

    public function create ()
    {
        //
    }

    public function store (Request $request)
    {
        //
    }

    public function show (Home $home)
    {
        //
    }

    public function edit (Home $home)
    {
        //
    }

    public function update (Request $request, Home $home)

    {


        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }


    }

    public function destroy (Home $home)
    {
        //
    }

    public function dog (Request $request)
    {
        return $request;
    }
    public function cart()
    {
        return view('basket.basket_page');
    }
    public function addToCart($id)
    {
        $product = Dog::find($id);
        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}
