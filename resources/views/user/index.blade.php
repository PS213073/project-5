@include('layouts.header')

{{-- @section('IndexMain') --}}
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

    <section>
        <div class="slider p-12">
            @foreach ($products as $product)
                <div class="product-card p-3 flex items-center flex-col">
                    <img class="rounded-t-md product-img w-[300px] h-[200px]" src="{{ $product->image }}"
                        alt="{{ $product->name }}">
                    <div class="pt-8 flex flex-col">
                        <p class="name">{{ $product->name }}</p>
                        <b class="price">&euro; {{ $product->price }}</b>
                        <a class="popup-btn">Quick View</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
{{-- @endsection('IndexMain') --}}

@include('layouts.footer')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $('.slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        arrows: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.slider').on('mousewheel', function(e, delta) {
        e.preventDefault();

        if (delta < 0) {
            $(this).slick('slickNext');
        } else {
            $(this).slick('slickPrev');
        }
    });
</script>
