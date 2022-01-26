<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        $products = Product::all();
        //dd($products);
        //Laravel permite buscar entre carpetas de vistas mediante un punto 
        return view('products.index')->with([
            'products' => $products
        ]);
    }


    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        return redirect()
                ->route('products.index')
                ->withSuccess("Product with id: {$product->id} has been created");
        //Si se usa with<Palabra>, manda un elemento Palabra a session
    }

    public function create()
    {
        return view("products.create");
    }

    public function show(Product $product)
    {
        //$selected = Product::findOrFail($product);
        //dd($selected);
        return view('products.show')->with([
            'product' => $product,
            'html' => '<h2>Hola</h2>'
        ]);
    }

    public function edit($product)
    {
        return view('products.edit')->with([
            'product' =>  Product::findOrFail($product)
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()
                ->route('products.index')
                ->withSuccess("Product with id: {$product->id} has been updated");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
                ->route('products.index')
                ->withSuccess("Product with id: {$product->id} has been deleted");
    }

}
