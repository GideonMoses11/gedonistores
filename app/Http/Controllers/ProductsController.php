<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image');

        //validation
        $this->validate($request, [
            'name'=>'required',
            'size'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg,gif|max:10000'
        ]);
        $products = new Product;
        $products->name = $request->input('name');
        $products->size = $request->input('size');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->category_id = $request->input('category_id');
        $products->image = $request->input('image');

        $file = $request->file('image');
        $file->move(public_path(). '/images/', $file->getClientOriginalName());
        $url = URL::to( '/images/'. $file->getClientOriginalName());

        $products->image = $url;
        $products->save();

        // dd($formInput);
        // exit();
        //imageupload
        // $image=$request->image;
        // if($image){
        //     $imageName=$image->getClientOriginalName();
        //     $image->move(public_path('images'), $imageName);
        //     $formInput['image']=$imageName;
        // }

        // dd($formInput);
        // dd($request);
        // dd($image);
        // Product::create($formInput);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $categories=Category::pluck('name','id');
        return view('admin.product.edit',compact(['product','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products=Products::find($id);
        $formInput = $request->except('image');

        //validation
        $this->validate($request, [
            'name'=>'required',
            'size'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg,gif|max:10000'
        ]);
        $products = new Product;
        $products->name = $request->input('name');
        $products->size = $request->input('size');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->category_id = $request->input('category_id');

        $file = $request->file('image');
        $file->move(public_path(). '/images/', $file->getClientOriginalName());
        $url = URL::to( '/images/'. $file->getClientOriginalName());

        $products->image = $url;
        $products->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
       $products = Product::find($id);
       $products->delete();
       return redirect()->route('product.index');
    }

    public function uploadImages($productId,Request $request)
    {


        $product=Product::find($productId);

        //        image upload
        // $image=$request->file('file');

        // if($image){
        //     $imageName=time(). $image->getClientOriginalName();
        //     $image->move('images',$imageName);
        //     $imagePath= "/images/$imageName";
        //     $product->images()->create(['image_path'=>$imagePath]);
        // }

        $file = $request->file('image');
        $file->move(public_path(). '/images/', $file->getClientOriginalName());
        $url = URL::to( '/images/'. $file->getClientOriginalName());

        $products->image = $url->create();

        return "done";
        // Product::create($formInput);
    }
}
