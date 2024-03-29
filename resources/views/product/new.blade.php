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
                                placeholder="Enter image"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-700 select-none font-medium">Naam</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                placeholder="Enter name"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="description" class="text-gray-700 select-none font-medium">Beschrijving</label>
                            <textarea name="description" id="description" placeholder="Enter description"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                rows="5">{{ old('description') }}</textarea>
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="price" class="text-gray-700 select-none font-medium">Price</label>
                            <input id="price" type="number" name="price"
                            value="{{ old('price') }}" placeholder="Enter price"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="color" class="text-gray-700 select-none font-medium">Color</label>
                            <input id="color" type="text" name="color"
                                value="{{ old('color') }}" placeholder="Enter color"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="height_cm" class="text-gray-700 select-none font-medium">Hoogte_cm</label>
                            <input id="height_cm" type="number" name="height_cm"
                                value="{{ old('height_cm') }}" placeholder="Enter height_cm"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="width_cm" class="text-gray-700 select-none font-medium">Breedte_cm</label>
                            <input id="width_cm" type="number" name="width_cm"
                                value="{{ old('width_cm') }}" placeholder="Enter width_cm"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="depth_cm" class="text-gray-700 select-none font-medium">Diepte_cm</label>
                            <input id="depth_cm" type="number" name="depth_cm"
                                value="{{ old('depth_cm') }}" placeholder="Enter depth_cm"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        <div class="flex flex-col space-y-2">
                            <label for="weight_gr" class="text-gray-700 select-none font-medium">Gewicht_gr</label>
                            <input id="weight_gr" type="number" name="weight_gr"
                                value="{{ old('weight_gr') }}" placeholder="Enter weight_gr"
                                class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div><br>

                        {{-- <h3 class="text-xl my-4 text-gray-600">Role</h3>
                 <div class="grid grid-cols-3 gap-4">
                   <div class="relative inline-flex">
                     <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                     <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="publish">
                       <option value="0">Draft</option>
                       <option value="1">Publish</option>
                     </select>
                   </div>
                 </div> --}}
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
