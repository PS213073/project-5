<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">

            <div class="bg-white shadow-md rounded my-6">
                <table id="products" class="cell-border stripe">
                    <thead>
                        <tr>
                            <th class="">Afbeelding</th>
                            <th class="">Naam</th>
                            <th class="">Prijs</th>
                            <th class="">Kleur</th>
                            <th title="prijs + winst margin">P + WM</th>
                            <th class="">Type</th>
                            <th class="">Aantal</th>
                            <th title="winst margin" class="">W-Margin%</th>
                            <th class="">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @can('ApiProduct access')
                            @foreach ($products as $product)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="">
                                        <img class="w-20" src="{{ $product['image'] }}" alt="Product image">
                                    </td>
                                    <td class="">{{ $product['name'] }}</td>
                                    <td class="">{{ $product['price'] }}</td>
                                    <td class="">{{ $product['color'] }}</td>
                                    <td id="total{{ $product['id'] }}">
                                        {{ number_format($product['price'], 2) }}
                                    </td>
                                    <!-- Calculate the final price by multiplying the base price with (1 + margin/100) -->


                                    <form action="{{ route('admin.kuin.add-product') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                        <td class=" text-right">
                                            <select class="rounded-lg p-2" name="category_id" id="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        {{-- <td class="py-2 px-6 border-b border-grey-light text-right">
                                            <input class="rounded-lg w-[75px] text-center p-2 quantity-input" type="number"
                                            name="quantity" id="quantity{{ $product['id'] }}" value="0"
                                            min="1" required data-price="{{ $product['price'] }}">
                                        </td> --}}
                                        <td class="py-2 px-6 border-b border-grey-light text-right">
                                            <input class="rounded-lg w-[75px] text-center p-2" type="number"
                                                name='quantity' value="0" min="1" required>
                                        </td>
                                        <td class="py-4 px-6 border-b border-grey-light text-right">
                                            <input class="rounded-lg w-[75px] text-center p-2 margin-input" type="number"
                                                name="margin" id="margin{{ $product['id'] }}" min="1"
                                                value="0" required data-price="{{ $product['price'] }}">
                                        </td>

                                        <td
                                            class="text-grey-lighter font-bold py-1 px-3 rounded text-sm bg-green hover:bg-green-dark text-[#3E6553]">
                                            <button>Toevoegen</button>

                                    </form>

                                    <a href="{{ route('admin.kuin.product', $product['id']) }}"
                                        class="text-grey-lighter font-bold py-1 px-3 rounded text-sm bg-green hover:bg-green-dark text-blue-400">Details</a>
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


    @push('scripts')
        <script>
            function calculateTotal(productId) {
                var margin = document.getElementById('margin' + productId).value;
                var price = document.getElementById('margin' + productId).dataset.price;

                var totalPrice = price * (1 + margin / 100);
                document.getElementById('total' + productId).textContent = totalPrice.toFixed(2);
            }

            document.addEventListener('input', function(event) {
                if (event.target.matches('.margin-input')) {
                    // console.log(event.target.value);
                    var productId = event.target.id.replace('margin', '');
                    calculateTotal(productId);
                }
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#products').DataTable({
                    columnDefs: [{
                        "orderable": false,
                        "targets": [0, 4, 5, 6, 7, 8]
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
                    },
                    language: {
                        lengthMenu: "_MENU_ per pagina",
                        info: "Toont _START_ tot _END_ van _TOTAL_ invoer",
                        infoEmpty: "Toont 0 tot 0 van 0 invoer",
                        infoFiltered: "(gefilterd van _MAX_ totale invoer)",
                        search: "Zoeken:",
                        zeroRecords: "Geen passende records gevonden",
                        paginate: {
                            first: "Eerste",
                            last: "Laatste",
                            next: "Volgende",
                            previous: "Vorige"
                        },
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
