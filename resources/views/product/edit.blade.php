<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2">
                            <label for="title" class="text-gray-700 select-none font-medium">Naam</label>
                            <input id="title" type="text" name="title" value="{{ old('title', $product->name) }}"
                                placeholder="naam invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="description" class="text-gray-700 select-none font-medium">Beschrijving</label>
                            <textarea name="description" id="description" placeholder="beschrijving invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                rows="5">{{ old('description', $product->description) }}</textarea>
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="price" class="text-gray-700 select-none font-medium">Inkoop Prijs</label>
                            <input id="price" type="number" name="old_price" disabled
                                value="{{ old('price', $product->price) }}" placeholder="prijs invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 text-black" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="price" class="text-gray-700 select-none font-medium">Winst Margin%</label>
                            <input class="rounded-lg w-[75px] text-center p-2 margin-input" type="number"
                                name="margin" id="margin{{ $product->id }}" min="1" value="0" required
                                data-price="{{ $product->price }}">
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="price" class="text-gray-700 select-none font-medium">Verkoop Prijs</label>
                            <input id="total{{ $product->id }}" type="number" name="price"
                                value="{{ old('price', $product->final_price) }}" placeholder="prijs invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="color" class="text-gray-700 select-none font-medium">Kleur</label>
                            <input id="color" type="text" name="color"
                                value="{{ old('color', $product->color) }}" placeholder="kleur invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="color" class="text-gray-700 select-none font-medium">Type</label>
                            <select
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ old('category', $category->id) }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="height_cm" class="text-gray-700 select-none font-medium">Hoogte cm</label>
                            <input id="height_cm" type="number" name="height_cm"
                                value="{{ old('height_cm', $product->height_cm) }}" placeholder="hoogte invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="width_cm" class="text-gray-700 select-none font-medium">Breedte cm</label>
                            <input id="width_cm" type="number" name="width_cm"
                                value="{{ old('width_cm', $product->width_cm) }}" placeholder="breedte invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="depth_cm" class="text-gray-700 select-none font-medium">Diepte cm</label>
                            <input id="depth_cm" type="number" name="depth_cm"
                                value="{{ old('depth_cm', $product->depth_cm) }}" placeholder="diepte invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="weight_gr" class="text-gray-700 select-none font-medium">Gewicht gr</label>
                            <input id="weight_gr" type="number" name="weight_gr"
                                value="{{ old('weight_gr', $product->weight_gr) }}" placeholder="gewicht invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>
                        <div class="text-center mt-16 mb-16">
                            <button type="submit"
                                class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Opslaan</button>
                        </div>
                </div>
            </div>
        </main>
    </div>
    </div>


    @push('scripts')
        <script>
            function calculateTotal(productId) {
                var margin = document.getElementById('margin' + productId).value;
                var price = document.getElementById('margin' + productId).dataset.price;

                var totalPrice = price * (1 + margin / 100);
                document.getElementById('total' + productId).value = totalPrice.toFixed(2);
            }

            document.addEventListener('input', function(event) {
                if (event.target.matches('.margin-input')) {
                    console.log(event.target.value);
                    var productId = event.target.id.replace('margin', '');
                    calculateTotal(productId);
                }
            });
        </script>
    @endpush
</x-app-layout>
