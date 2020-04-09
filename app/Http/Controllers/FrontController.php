<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;

class FrontController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $shirts = Product::all();
        return view('front.home', compact('shirts'));
    }

    public function shirts(){
        $shirts = Product::all();
        return view('front.shirts', compact('shirts'));
    }

    public function shirtpage(Product $product, $id){
        $product = Product::find($id);
        return view('front.shirtpage', compact('product'));
    }
}
