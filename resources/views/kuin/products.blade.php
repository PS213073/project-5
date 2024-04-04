<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">

            <div class="bg-white shadow-md rounded my-6">
                <table id="Table" class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Afbeelding</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Naam</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Prijs</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Kleur</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right pr-14">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @can('ApiProduct access')
                            @foreach ($products as $product)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <img class="w-20" src="{{ $product['image'] }}" alt="Product image">
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $product['name'] }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $product['price'] }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $product['color'] }}</td>
                                    </td>

                                    <td class="py-4 px-6 border-b border-grey-light text-right">
                                        <form action="{{ route('admin.kuin.add-product')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                            <select name="category_id" id="category_id">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="number" name='quantity' value="0">
                                            <button>Toevoegen</button>
                                    </form>
                                        {{-- <a href="#"
                                            class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-[#3E6553]">Toevoegen</a> --}}

                                        <a href="{{ route('admin.kuin.product', $product['id']) }}"
                                            class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endcan
                    </tbody>
                </table>
            </div>

        </div>
    </main>
    </div>
</x-app-layout>
