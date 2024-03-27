<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WinkelProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9);
        return view('user.product', ['products' => $products]);
    }
}
