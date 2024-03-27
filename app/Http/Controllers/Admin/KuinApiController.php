<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
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
        $categories = Category::all();
        // For fetching all products data
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken,
        ])->withoutVerifying()->get('https://kuin.summaict.nl/api/product');

        // Check if the request was successful
        if ($response->successful()) {
            // Parse the JSON response to retrieve product data
            $products = $response->json();

            // Pass the product data to the admin dashboard view
            return view('kuin.products', compact('products', 'categories'));
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
        } else {
            // Handle the case where the request failed
            return response()->json(['error' => 'Failed to fetch order from Kuin API'], $response->status());
        }
    }

    public function addToDatabase(Request $request)
    {

        $category = $request->input('category_id');
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken,
        ])->withoutVerifying()->post("https://kuin.summaict.nl/api/orderItem",[
            "quantity"=> $quantity,
            'product_id'=> $productId
        ]);
            // dd($response->body());
        if ($response->successful()) {
            $productResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
            ])->withoutVerifying()->get("https://kuin.summaict.nl/api/product/{$productId}");
                // dd($productResponse->body());

                if ($productResponse->successful()) {
                    $data = $productResponse->json();

                   $product = Product::create([
                        'product_id' => $data['id'],
                        'name' => $data['name'],
                        'description' => $data['description'],
                        'price' => $data['price'],
                        'image' => $data['image'],
                        'color' => $data['color'],
                        'height_cm' => $data['height_cm'],
                        'width_cm' => $data['width_cm'],
                        'depth_cm' => $data['depth_cm'],
                        'weight_gr' => $data['weight_gr'],
                        'quantity' => $quantity,
                        'category_id' => $category,
                        // Add any other fields from $data that you want to store
                    ]);

                    // $data->save();
                }
                // dd($request->all());

                return back()->with('success','besteld');
        }
    }
}
