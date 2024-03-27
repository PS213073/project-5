<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">

            <div class="bg-white shadow-md rounded my-6 p-5">

                <img class="w-20" src="{{ $product['image'] }}" alt="Product image">
                <h3>Name: {{ $product['name'] }}</h3>
                <h3>Prijs: {{ $product['price'] }}</h3>
                <h3>Kleur: {{ $product['color'] }}</h3>
                <p>Description: {{ $product['description'] }}</p>
                <h3>Hoogte: {{ $product['height_cm'] }}</h3>
                <h3>Breedte: {{ $product['width_cm'] }}</h3>
                <h3>Diepte: {{ $product['depth_cm'] }}</h3>
                <h3>Gewicht: {{ $product['weight_gr'] }}</h3>
            </div>

        </div>
    </main>
    </div>
</x-app-layout>
