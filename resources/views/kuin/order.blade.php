<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">

            <div class="bg-white shadow-md rounded my-6 p-5">
                @if (isset($message))
                    <p>{{ $message }}</p>
                @else
                    @foreach ($order as $item)
                        <div>
                            <h3>Order Id: {{ $item['order_id'] }}</h3>
                            <h3>Product Id: {{ $item['product_id'] }}</h3>
                            <h3>Quantity: {{ $item['quantity'] }}</h3>
                            <h3>Datum: {{ \Carbon\Carbon::parse($item['created_at'])->format('Y-m-d') }}</h3>
                        </div>
                    @endforeach
                @endif
            </div>


        </div>
    </main>
    </div>
</x-app-layout>
