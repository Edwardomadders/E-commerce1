<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{
    public function allProducts(){
        $products=Product::all();
        return response()->json(["products"=>$products]);
    }
    public function products(){
        $products = product::all();
        return Inertia::render('Products',['products'=>$products]);
    }

    public function store (Request $request){
        $request -> validate([
            // dd($request->all()),
            'name' => 'required',
            'price' => 'required',
            'image' => '',
            'quantity' => 'required',
            'location' => 'required',
            'rate' => 'required',
            'istrending' => 'required',
        ]);

    if($request->file('image'))
    {
        $path =$request->file('image')->storePublicly('images');
    }

        Product::create ([
            "name" => $request->name,
            "price" => $request->price,
            "image" => $path,
            "quantity" => $request->quantity,
            "location" => $request->location,
            "rate" => $request->rate,
            "istrending" => true,
        ]);
        return redirect()->back();
    }
    public function post()
    {
        return Inertia::render('CreateProduct');
    }
}
