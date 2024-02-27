<?php

namespace App\Http\Controllers;

use App\Models\generate;
use App\Models\product;
use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{

    // categories Information store
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required',
            'title' => 'required',
            'quantity' => 'required',
        ]);
        $picture = $request->file('picture')->GetClientOriginalName();
        $path = $request->file('picture')->storeAs('/picture', $picture);
        //move uploaded file
        $request->picture->move(public_path('picture'), $picture);
        $category  = new sections;
        $category->picture = $path;
        $category->title = $request['title'];
        $category->quantity = $request['quantity'];
        $category->save();

        return redirect('/Admin/categories');
    }

    // products detail save  in database
    public function save(Request $request)
    {
        $request->validate([
            'img' => 'required',
            'productInfo' => 'required',
            'productName' => 'required',
            'productPrice' => 'required',
            'cutPrice' => 'required',
            'smallDescription' => 'required',
            'mainDescription' => 'required',
        ]);
        $img = $request->file('img')->GetClientOriginalName();
        $path = $request->file('img')->storeAs('/img', $img);
        //move uploaded file
        $request->img->move(public_path('img'), $img);
        $products  = new product;
        $products->img = $path;
        $products->productName = $request['productName'];
        $products->productPrice = $request['productPrice'];
        $products->cutPrice = $request['cutPrice'];
        $products->smallDescription = $request['smallDescription'];
        $products->mainDescription = $request['mainDescription'];
        $products->productInfo = $request['productInfo'];
        $products->save();

        return redirect('/Admin/products');
    }


    public function coupon(){
        return view('Admin.coupon');
    }
    public function couponsave(Request $request){
        $request->validate([
            'coupon_name'=>'required',
            'desc'=>'required',
            'max_uses'=>'required',
            'max_uses_users'=>'required',
            'type'=>'required',
            'discount_ammount'=>'required',
            'min_ammount'=>'required',
            'status'=>'required',
            'starts_at'=>'required',
            'expires_at'=>'required',
            'code'=>'required',
        ]);


        $coupon = new generate;
        $coupon->coupon_name = $request['coupon_name'];
        $coupon->desc = $request['desc'];
        $coupon->max_uses = $request['max_uses'];
        $coupon->max_uses_users = $request['max_uses_users'];
        $coupon->type = $request['type'];
        $coupon->discount_ammount = $request['discount_ammount'];
        $coupon->min_ammount = $request['min_ammount'];
        $coupon->status = $request['status'];
        $coupon->starts_at = $request['starts_at'];
        $coupon->expires_at = $request['expires_at'];
        $coupon->code = $request['code'];
        $coupon->save();

        return redirect('/Admin/Coupon');

    }
    public function couponshow(){
        $coupon = generate::all();
        return view('Admin.coupon')->with(['coupon' => $coupon]);
    }
}