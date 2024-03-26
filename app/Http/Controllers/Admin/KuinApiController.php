<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KuinApiController extends Controller
{
    protected $accessToken;

    // private constructor function
    function __construct()
    {
        $this->middleware('role_or_permission:ApiProduct access');
        $this->middleware('role_or_permission:ApiOrder access');
        $this->accessToken = '54|j4XGUDiqPxCsnC2RiCZimkim0TwHPJ5KYk9XYY6B';
    }

    public function products(Request $request)
    {
        // For fetching all products data
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken,
        ])->withoutVerifying()->get('https://kuin.summaict.nl/api/product');

        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response to retrieve product data
            $products = $response->json();

            // $page = $request->get('page', 1); // Get the current page or default to 1
            // $perPage = 15;

            // $products = collect($data)->forPage($page, $perPage);

            // Pass the product data to the admin dashboard view
            return view('kuin.products', compact('products'));
        } else {
            // Handle the case where the request failed
            return response()->json(['error' => 'Failed to fetch products from Kuin API'], $response->status());
        }
    }

    // For fetching single product data
    public function product($productId)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken,
        ])->withoutVerifying()->get("https://kuin.summaict.nl/api/product/{$productId}");
            // dd($response->body());
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response to retrieve product data
            $product = $response->json();
            // dd($product);
            // Pass the product data to the admin dashboard view
            return view('kuin.product', compact('product'));
        } else {
            // Handle the case where the request failed
            return response()->json(['error' => 'Failed to fetch products from Kuin API'], $response->status());
        }
    }

    // For fetching all orders data
    public function orders()
    {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken,
        ])->withoutVerifying()->get('https://kuin.summaict.nl/api/order');

        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response to retrieve product data
            $orders = $response->json();

            // Pass the product data to the admin dashboard view
            return view('kuin.orders', compact('orders'));
        } else {
            // Handle the case where the request failed
            return response()->json(['error' => 'Failed to fetch orers from Kuin API'], $response->status());
        }
    }

    // For fetching single order data
    public function order($orderId)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken,
        ])->withoutVerifying()->get("https://kuin.summaict.nl/api/orderItem?order_id={$orderId}");
        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response to retrieve order data
            $order = $response->json();
            // dd($order);

            if (empty($order)) {
                $message = "Empty no order items";
                return view('kuin.order', compact('message'));
            }

            // Pass the order data to the admin dashboard view
            return view('kuin.order', compact('order'));
        }
        else {
            // Handle the case where the request failed
            return response()->json(['error' => 'Failed to fetch order from Kuin API'], $response->status());
        }
    }
}
