<?php

namespace App\Http\Controllers;
use App\Models\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $client;
    protected $accessToken;



    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
        // $this->client = new Client();
        $this->accessToken = '54|j4XGUDiqPxCsnC2RiCZimkim0TwHPJ5KYk9XYY6B';
    }
    public function fetchPlantsFromExternalApi()
    {
        try {

            $response = $this->client->request('GET', 'https://kuin.summaict.nl/api/product', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Accept' => 'application/json', // Adjust content type as needed
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            foreach ($data as $plant) {
                Product::create([
                    'name' => $plant['name'],
                    'description' => $plant['description'],
                    'price' => $plant['price'],
                    'image' => $plant['image'],
                    'color' => $plant['color'],
                    'height_cm' => $plant['height_cm'],
                    'width_cm' => $plant['width_cm'],
                    'depth_cm' => $plant['depth_cm'],
                    'weight_gr' => $plant['weight_gr'],
                ]);
            }

            // dd($data);
            return 'Plants fetched and stored successfully!';
        } catch (GuzzleException $e) {
            return 'Error fetching plants: ' . $e->getMessage();
        }
    }
}
