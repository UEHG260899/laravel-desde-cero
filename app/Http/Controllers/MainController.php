<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return view('welcome')->with([
            'products' => Product::all(),
        ]);
    }
}
