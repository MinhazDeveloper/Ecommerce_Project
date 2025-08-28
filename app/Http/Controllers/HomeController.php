<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Charge;


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

        $totalprice = $cartItems->sum(function($item){
        return $item->price * $item->quantity;
        });
        
        return view('home.cart_show',compact('cartItems', 'totalprice'));
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
    public function stripe($totalprice){

        return view('home.stripe',compact('totalprice'));
    }
    // public function stripePost(Request $request){
    //     dd($request);
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     Stripe\Charge::create ([
    //             "amount" => 100 * 100,
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "Test payment from itsolutionstuff.com." 

    //     ]);
    //     Session::flash('success', 'Payment successful!');
    //     return back();

    // }
     public function stripePost(Request $request){
        // dd($request);
        Stripe::setApiKey(env('STRIPE_SECRET')); // secret key server-side

        $charge = Charge::create([
            "amount" => 100 * 100, // 100 USD in cents
            "currency" => "usd",
            "source" => $request->stripeToken, // client-side token
            "description" => "Test payment from Laravel."
        ]);

        Session::flash('success', 'Payment successful!');
        return back();
    }
}
