<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
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
        return view('products.show', ['product' => $product]);
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
