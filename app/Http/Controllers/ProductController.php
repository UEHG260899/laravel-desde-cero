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
            //flash solo esta disponible hasta la siguiente petición
            session()->flash('error', 'Can´t be available with stock 0');
            return redirect()->back()->withInput(request()->all());
        }

        session()->forget('error');
        $product = Product::create(request()->all());
        //return redirect()->back();
        //return redirect()->action('MainController@main');
        return redirect()->route('products.index');
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
            //flash solo esta disponible hasta la siguiente petición
            session()->flash('error', 'Can´t be available with stock 0');
            return redirect()->back()->withInput(request()->all());
        }

        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()->route('products.index');
    }

    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index');
    }

}
