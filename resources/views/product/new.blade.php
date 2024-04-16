<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.products.store') }}">
                        @csrf
                        <div class="flex flex-col space-y-2">
                            <label for="image" class="text-gray-700 select-none font-medium">Afbeelding</label>
                            <input id="image" type="file" name="image" value="{{ old('image') }}"
                                placeholder="afbeelding toevoegen"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-700 select-none font-medium">Naam</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                placeholder="naam invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="description" class="text-gray-700 select-none font-medium">Beschrijving</label>
                            <textarea name="description" id="description" placeholder="beschrijving invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                rows="5">{{ old('description') }}</textarea>
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="price" class="text-gray-700 select-none font-medium">Prijs</label>
                            <input id="price" type="number" name="price" value="{{ old('price') }}"
                                placeholder="prijs invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="color" class="text-gray-700 select-none font-medium">Color</label>
                            <input id="color" type="text" name="color" value="{{ old('color') }}"
                                placeholder="kleur invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="height_cm" class="text-gray-700 select-none font-medium">Hoogte_cm</label>
                            <input id="height_cm" type="number" name="height_cm" value="{{ old('height_cm') }}"
                                placeholder="hoogte invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="width_cm" class="text-gray-700 select-none font-medium">Breedte_cm</label>
                            <input id="width_cm" type="number" name="width_cm" value="{{ old('width_cm') }}"
                                placeholder="breedte invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="depth_cm" class="text-gray-700 select-none font-medium">Diepte_cm</label>
                            <input id="depth_cm" type="number" name="depth_cm" value="{{ old('depth_cm') }}"
                                placeholder="diepte invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="weight_gr" class="text-gray-700 select-none font-medium">Gewicht_gr</label>
                            <input id="weight_gr" type="number" name="weight_gr" value="{{ old('weight_gr') }}"
                                placeholder="gewicht invoeren"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>
                        <div class="text-center mt-16 mb-16">
                            <button type="submit"
                                class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Submit</button>
                        </div>
                </div>


            </div>
        </main>
    </div>
    </div>
</x-app-layout>
