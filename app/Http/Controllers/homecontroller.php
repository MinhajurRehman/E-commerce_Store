<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use App\Models\sections;
use App\Models\User;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function view(){

        $products = product::orderBy('id', 'desc')->take(8)->get();
        return view('welcome')->with(['products' => $products]);

    }

    // public function see(){

    //     $products = product::orderBy('id', 'desc')->take(6)->get();
    //     return view('detail')->with(['products' => $products]);

    // }

    public function Shop($id)
    {
        $products  = product::find($id);
        if (is_null($products)) {
            //not found
            return redirect('/');
        } else {
            //found
            $url = url('/shop') . "/" . $id;
            $data = compact('products', 'url');
            return view('detail')->with($data);
        }
    }

    public function addItemtoCart(Request $request){
        $product_id = $request->input('product_id');
        $user_id = $request->input('user_id');
        $quantity = $request->input('quantity');

        $existingCartItem = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if ($existingCartItem) {
            // If the item exists, update the quantity
            $existingCartItem->quantity = $quantity;
            $existingCartItem->save();
        } else {
            // If the item doesn't exist, create a new cart item
            Cart::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart successfully');
    }

    public function removeItemFromCart(Request $request){
        $product_id = $request->input('product_id');
        $user_id = $request->input('user_id');

        // Find the cart item
        $cartItem = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();

            return redirect()->back()->with('success', 'Item removed from cart successfully');
        }

        return redirect()->back()->with('error', 'Item not found in the cart');
    }



}