<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;


class HomeController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('home.user',compact('products'));
    }
    public function redirect(){
        $products = Product::all();
        $usertype = Auth::User()->usertype;

        if($usertype == 1){

            return view('admin.home');
        }else{
            
            return view('home.user',compact('products'));
        }
    }
    public function productDetails($id){

        $product = Product::findOrFail($id);
        return view('home.product_details',compact('product'));
    }
    public function productAddCart(Request $request, $id){

        if(Auth::id()){

            $user = Auth::User();
            $product = Product::find($id);
            // dd($user->name);
            $cart = Cart::create([
                    'name'=> $user->name,
                    'email'=>$user->email,
                    'phone'=>$user->phone,
                    'address'=>$user->address,
                    'product_title'=>$product->title,
                    'price'=>$product->price,
                    'image'=>$product->image,
                    'product_id'=>$product->id,
                    'user_id'=>$user->id,
                    'quantity'=>$request->input('quantity'),

            ]);

            return response()->json([
                'status'=>'success',
                'message'=>'Cart added successfully',
            ]);
        }else{

            return redirect('login');
        }
    }
    public function cart_show(){

        $cartItems = Cart::all();
        return view('home.cart_show',compact('cartItems'));
    }
}
