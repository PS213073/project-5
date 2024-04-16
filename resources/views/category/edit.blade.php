<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-700 select-none font-medium">Naam</label>
                            <input id="name" type="text" name="name" value="{{ old('name', $category->name) }}"
                                placeholder="naam invoeren"
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
</x-app-layout>
