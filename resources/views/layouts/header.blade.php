<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="assets/js/scrollreveal.min.js" defer></script>
    <script src="{{ asset('main.js') }}"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container p-5">
            <a href="#" class="nav__logo">
                <i class="ri-leaf-line nav__logo-icon"></i> GV
            </a>

            <ul class="gap-6 theme-pages">
                <li><a href="">Home</a></li>
                <li><a href="">Winkel</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="">Over Ons</a></li>
            </ul>

            <div class="nav__btns inline-flex gap-3">
                <!-- Theme change button -->
                <a href=""><i class="ri-user-line"></i></a>
                <a href=""><i class="ri-shopping-cart-2-line"></i></a>
            </div>
        </nav>
    </header>

    <main>
