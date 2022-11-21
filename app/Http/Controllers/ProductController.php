<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }
    
    public function store(Request $request){
        $request->validate([
            'slug' => 'required',
            'product_code' => 'required',
            'product_code' => 'required|string|unique:products,product_code',
            'description' => 'required',
            'image' => 'required',

            'created_by' => 'required',
            'updated_by' => 'required',
        ]);
        return Product::create($request->all());
        // return Product::create([
        //     'slug' => "product-code",
        //     'product_code' => "product_code",
        //     'description' => "product_description",
        //     'image' => "product_image_path",
    
        //     'created_by' => 1,
        //     'updated_by' => 1,
        // ]);
    }  

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id){
        return Product::destroy($id);
    }

    public function show($input){
        return Product::where("product_code", 'like','%'.$input.'%')->get();
    }
}
