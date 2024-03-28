<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WinkelProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })
            ->latest()->get();
        // $products = Product::paginate(9);
        return view('user.product', compact('products', 'categories'));
    }
}
