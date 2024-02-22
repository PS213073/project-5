<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
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
        <section class="home" id="home">
            <div class="home__container container grid">
                <img src="{{ asset('images/home.png') }}" alt="" class="home__img">

                <div class="home__data">
                    <h1 class="home__title">
                        Plants will make <br> your life better
                    </h1>
                    <p class="home__description">
                        Create incredible plant design for your offices or apastaments.
                        Add fresness to your new ideas.
                    </p>

                    <a href="" class="button button--flex">
                        Explore <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>

                <div class="home__social">
                    <span class="home__social-follow">
                        Follow Us
                    </span>
                    <div class="home__social-links">
                        <a href="" class="home__social-link" target="_blank">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="" class="home__social-link" target="_blank">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="" class="home__social-link" target="_blank">
                            <i class="ri-twitter-x-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="theme-product w-full flex justify-center flex-col">
            <h2 class="text-center text-3xl font-bold pb-16">Producten</h2>
            <div class="flex justify-center align-middle items-center">
                <div class="theme-product-one p-3 flex items-center flex-col">
                    <img class="w-1/3" src="{{ asset('images/product1.png') }}" alt="product1">
                    <div class="pt-8">
                        <p>Pokemon plant</p>
                        <b>&euro; 10</b>
                    </div>
                </div>
                <div class="theme-product-two p-3 flex items-center flex-col">
                    <img class="w-full" src="{{ asset('images/product2.png') }}" alt="product2">
                    <div>
                        <p>Money plant</p>
                        <b>&euro; 10</b>
                    </div>
                </div>
                <div class="theme-product-three p-3 flex items-center flex-col">
                    <img class="w-1/3" src="{{ asset('images/product3.png') }}" alt="product3">
                    <div class="pt-8">
                        <p>Groot plant</p>
                        <b>&euro; 10</b>
                    </div>
                </div>
            </div>
        </section> --}}

        <section>
            <div class="multiple-items">
                @foreach ($products as $product)
                    <div class="theme-product-one p-3 flex items-center flex-col">
                        <img class="w-[50px] h-[50px]" src="{{ $product->image }}" alt="{{ $product->name }}">
                        <div class="pt-8">
                            <p>{{ $product->name }}</p>
                            <b>&euro; {{ $product->price }}</b>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <footer class="footer p-10">
        <nav>
            <h6 class="footer-title">Paginas</h6>
            <a class="link link-hover">Home</a>
            <a class="link link-hover">Winkel</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Over Ons</a>
        </nav>
        <nav>
            <h6 class="footer-title"></h6>
            <h6 class="footer-title"></h6>
            <a class="link link-hover">Raj Hogewoning</a>
            <a class="link link-hover">Tuinstraat 167</a>
            <a class="link link-hover">2587 WD  Nuenen</a>
            <a class="link link-hover">06-33024999</a>
        </nav>
        <nav>
            <h6 class="footer-title"></h6>
            <h6 class="footer-title"></h6>
            <a class="link link-hover">Raj Hogewoning</a>
            <a class="link link-hover">Tuinstraat 167</a>
            <a class="link link-hover">2587 WD  Nuenen</a>
            <a class="link link-hover">06-33024999</a>
        </nav>
        <nav>
            <h6 class="footer-title"></h6>
            <h6 class="footer-title"></h6>
            <a class="link link-hover">Raj Hogewoning</a>
            <a class="link link-hover">Tuinstraat 167</a>
            <a class="link link-hover">2587 WD  Nuenen</a>
            <a class="link link-hover">06-33024999</a>
        </nav>
        <nav>
            <h6 class="footer-title"></h6>
            <h6 class="footer-title"></h6>
            <h6 class="footer-title">Email adress</h6>
            <a class="link link-hover">info@groenevingersshop.com</a>
        </nav>
        <nav>
            <h6 class="footer-title">Social</h6>
            <div class="grid grid-flow-col gap-4">
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg>
                </a>
            </div>
        </nav>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 5
        });
    </script>
</body>


</html>
