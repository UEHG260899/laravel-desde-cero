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
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable']
        ];

        request()->validate($rules);

        if(request()->status == 'available' && request()->stock == 0){
            return redirect()
                    ->back()
                    ->withInput(request()->all())
                    ->withErrors('Can´t be available with stock 0');
                    //withErrors manda un valor a la variable global errors
        }

        $product = Product::create(request()->all());
        return redirect()
                ->route('products.index')
                ->withSuccess("Product with id: {$product->id} has been created");
        //Si se usa with<Palabra>, manda un elemento Palabra a session
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
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable']
        ];

        request()->validate($rules);

        if(request()->status == 'available' && request()->stock == 0){
            return redirect()
                    ->back()
                    ->withInput(request()->all())
                    ->withErrors('Can´t be available with stock 0');
        }

        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()
                ->route('products.index')
                ->withSuccess("Product with id: {$product->id} has been updated");
    }

    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()
                ->route('products.index')
                ->withSuccess("Product with id: {$product->id} has been deleted");
    }

}
