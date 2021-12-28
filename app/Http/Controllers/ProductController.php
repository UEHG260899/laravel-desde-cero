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
        dd($products);
        //Laravel permite buscar entre carpetas de vistas mediante un punto 
        return view('products.index');
    }


    public function store()
    {

    }

    public function create()
    {
        return 'This is the form to create a product';   
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
        return "Showing the form to edit product with id {$product}";
    }

    public function update($product)
    {

    }

    public function destroy($product)
    {

    }

}
