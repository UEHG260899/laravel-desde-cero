<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        //dd($products);
        //Laravel permite buscar entre carpetas de vistas mediante un punto 
        return view('products.index')->with([
            'products' => $products
        ]);
    }


    public function store()
    {
        $product = Product::create(request()->all());
        return $product;
    }

    public function create()
    {
        return view("products.create");
    }

    public function show($product)
    {
        $selected = Product::findOrFail($product);
        //dd($selected);
        return view('products.show')->with([
            'product' => $selected,
            'html' => '<h2>Hola</h2>'
        ]);
    }

    public function edit($product)
    {
        return view('products.edit')->with([
            'product' =>  Product::findOrFail($product)
        ]);
    }

    public function update($product)
    {
        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return $product;
    }

    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return $product;
    }

}
