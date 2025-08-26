<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('home.user',compact('products'));
    }
    public function redirect(){

        $usertype = Auth::User()->usertype;

        if($usertype == 1){

            return view('admin.home');
        }else{
            
            return view('home.user');
        }
    }
}
