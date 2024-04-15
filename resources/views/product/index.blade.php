<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                @can('Product create')
                    <a href="{{ route('admin.products.create') }}"
                        class="bg-[#3E6553] text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-[#1e3129] transition-colors ">New
                        product</a>
                @endcan
            </div>

            <div class="bg-white shadow-md rounded my-6">
                <table id="products" class="text-left w-full border-collapse">
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
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Vooraad</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Typen</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right pr-14">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @can('Product access')
                            @foreach ($products as $product)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <img class="w-20" src="{{ $product->image }}" alt="Product image">
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $product->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $product->final_price }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $product->color }}</td>
                                    <td
                                        class="py-4 px-6 border-b border-grey-light
                                    @if ($product->quantity <= 50) text-red-500 after:content-['_▼'] @endif">
                                        {{ $product->quantity }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $product->category->name }}
                                    </td>

                                    <td class="py-4 px-6 border-b border-grey-light text-right">

                                        @can('Product edit')
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                                        @endcan

                                        @can('Product delete')
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endcan
                    </tbody>
                </table>

                {{-- @can('Product access')
                    <div class="text-right p-4 py-10">
                        {{ $products->links() }}
                    </div>
                @endcan --}}
            </div>

        </div>
    </main>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#products').DataTable({
                    columnDefs: [{
                        "orderable": false,
                        "targets": [0, 6]
                    }],
                    responsive: true,
                    order: [
                        [0, "desc"]
                    ],
                    layout: {
                        // topStart: 'info',
                        // bottomStart: null,
                        bottom: 'paging',
                        bottomEnd: null
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
