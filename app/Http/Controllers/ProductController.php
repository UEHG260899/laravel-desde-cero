<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return 'This is the list of products';
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
        return "Showing product with id {$product}";
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