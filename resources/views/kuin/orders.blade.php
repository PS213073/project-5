<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">

            <div class="bg-white shadow-md rounded my-6">
                <table id="Table" class="cell-border stripe">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Order Id</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                User Id</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Status</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">
                                Date</th>

                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right pr-14">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @can('ApiOrder access')
                            @foreach ($orders as $order)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $order['id'] }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $order['user_id'] }}</td>
                                    <td
                                        class="py-4 px-6 border-b border-grey-light
                                    @if ($order['status'] === 'completed') text-green-500
                                    @elseif ($order['status'] === 'pending') text-orange-500
                                    @elseif ($order['status'] === 'cancelled') text-red-500 @endif">
                                        {{ $order['status'] }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        {{ \Carbon\Carbon::parse($order['created_at'])->format('Y-m-d') }}</td>
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light text-right">


                                        <a href="{{ route('admin.kuin.order', $order['id']) }}"
                                            class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Details</a>
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
</x-app-layout>


