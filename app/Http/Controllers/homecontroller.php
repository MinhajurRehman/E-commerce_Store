<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\generate;
use App\Models\Order;
use App\Models\product;
use App\Models\sections;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Nette\Utils\Json;

class homecontroller extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function view(Request $request){
        $users = User::where('id','=',Session::get('loginId'))->first();

        $products = product::orderBy('id', 'desc')->take(8)->get();
        return view('welcome', [
        ])->with(['products' => $products])->with(['users'=>$users]);

    }

    // public function see(){

    //     $products = product::orderBy('id', 'desc')->take(6)->get();
    //     return view('detail')->with(['products' => $products]);

    // }

    public function Shop($id){
        $users = User::where('id','=',Session::get('loginId'))->first();
        $products  = product::find($id);

        if (is_null($products)) {
            //not found
            return redirect('/');
        } else {
            //found
            $url = url('/shop') . "/" . $id;
            $data = compact('products', 'url', 'users');
            return view('detail', [
            ])->with($data);
        }
    }

    function cart(Request $request){
        $users = User::where('id','=',$request->user->id)->first();
        $user_id = $request->user->id;
        //dd($request->user);

        $items = Cart::with('product')->where('user_id', $user_id)->get();
        // dd($user_id);
        return view("cart", [
            "items" => $items,
            "users"=>$users
        ]);

    }

    public function addItemtoCart(Request $request){

        $product_id = $request->input('product_id');
        $user_id = $request->user->id;
        $quantity = $request->input('quantity');
        $size = $request->input('size');
        $color = $request->input('color');

        $existingCartItem = Cart::where('product_id', $product_id)->where('user_id', $user_id)->first();

        if ($existingCartItem) {
            // If the item exists, update the quantity
            $existingCartItem->quantity = $quantity;
            $existingCartItem->size = $size;
            $existingCartItem->color = $color;
            $existingCartItem->save();
        } else {
            // If the item doesn't exist, create a new cart item
            Cart::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
                'quantity' => $quantity,
                'size' => $size,
                'user_type' => "buyer",
                'color' => $color,
            ]);
        }

        return redirect()->route("cart")->with('success', 'Item added to cart successfully');
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

    function checkout(Request $request) {
        // Assuming you have authenticated users
        $user_id = $request->user->id;

        // Create a new order
        $order = Order::create([
            'user_id' => $user_id,
            'total' => $request->total
        ]);

        // Associate the carts with the order
        Cart::where('user_id', $user_id)->update(['order_id' => $order->id]);

        return "Thank you !";

    }

    public function apply_coupon_code(Request $request){
        $result=DB::table('coupons')
        ->where(['code'=>$request->coupon_code])
        ->get();

        if(isset($result[0])){
            $value=$result[0]->value;
            $type=$result[0]->type;
            if($result[0]->status==1){
                if($result[0]->one_time==1){
                    $status='denied';
                    $msg='not used coupon multiple times its one time coupon';
                }else{
                    $min_ammount=$result[0]->min_ammount;
                }
                $status='success';
                $msg='coupon code applied';

            }else{
                $status='error';
                $msg='coupon code deactivated';
            }

        }else{
            $status='error';
            $msg='Please enter valid coupon code';
        }

        if($status='success'){

        }
        return response()->json(['status'=>$status,'msg'=>$msg]);
    }

    function search(Request $request) {
        $products = product::all();
        $dbQuery = product::query();

        if ($request->filled('search')) {
            $query = $request->input('search');
            $dbQuery->where('productName', 'like', '%' . $query . '%');
        }
        $product = $dbQuery->get();
        error_log($product);


        return view('dashboard', [
            'products' => $products,
            'request' => $request,
            'product' => $product,
        ]);
    }

    public function logout(){
        if(Session::has('LoggedUser')){
            Session::pull('LoggedUser');
            return redirect()->route("user.login");
        }
    }

}