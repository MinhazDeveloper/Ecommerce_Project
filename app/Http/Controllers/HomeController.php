<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;


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
    public function remove_cart($id){

        $cart = Cart::find($id)
                ->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'Deleted product from Add to cart'
        ]);        

    }
    public function cash_order(){

        $user = Auth::User();
        $user_id = $user->id;
        // dd($user_id);
        $data = Cart::where('user_id',$user_id)->get();
        foreach($data as $data){
            Order::create([
                'name'=>$data->name,
                'email'=>$data->email,
                'phone'=>$data->phone,
                'address'=>$data->address,
                'user_id'=>$data->user_id,
                'product_title'=>$data->product_title,
                'quantity'=>$data->quantity,
                'price'=>$data->price,
                'image'=>$data->image,
                'product_id'=>$data->product_id,
                'payment_status'=>'Cash on delivery',
                'delivery_status'=>'processing'
            ]);

            return response()->json([
                'message'=>'Order added successfully'
            ]);
        }
    }
}
