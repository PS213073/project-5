<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Groene Vingers') }}</title> --}}
    <title>Groene Vingers - Admin</title>

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

        @include('layouts.sidebar')


        <div class="flex-1 flex flex-col overflow-scroll">

            @include('layouts.header')


            @if (\Session::has('success'))
                <div class="text-green-600 pt-5 pl-5">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('error'))
                <div class="text-green-600 pt-5 pl-5">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif

            @if ($errors->any())
                <div class="text-red-600  pt-5 pl-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ $slot }}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

    <style>
        #products th,
        #orders th,
        #products td,
        #orders td {
            text-align: center !important;
            border-radius: 2px;
        }

        .dt-layout-row {
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>


    {{-- <script>
        $(document).ready(function() {
            $('#Table').DataTable({
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
                }
            });
        });
    </script> --}}

    {{-- <script>
        window.onload = function() {
            console.log('Window loaded');
            alert('working')
        }

        function calculateTotal(productId) {
            var margin = document.getElementById('margin' + productId).value;
            var price = document.getElementById('margin' + productId).dataset.price;

            var totalPrice = price * (1 + margin / 100);
            document.getElementById('total' + productId).textContent = totalPrice.toFixed(2);
        }

        document.addEventListener('input', function(event) {
            if (event.target.matches('.margin-input')) {
                console.log(event.target.value);
                var productId = event.target.id.replace('margin', '');
                calculateTotal(productId);
            }
        });
    </script> --}}

    @stack('scripts')

</body>

</html>
