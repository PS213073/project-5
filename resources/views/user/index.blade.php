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
                <div class="product-card p-3 flex items-center flex-col" data-toggle="modal">
                    <img data-content="image" class="rounded-t-md product-img w-[300px] h-[200px]"
                        src="{{ $product->image }}" alt="{{ $product->name }}">
                    <div class="pt-8 flex flex-col">
                        <div class="pb-4" data-content="name">
                            <p class="name truncate">{{ $product->name }}</p>
                        </div>
                        <div data-content="price" class="pb-4">
                            <b class="price">&euro; {{ $product->price }}</b>
                        </div>
                        <div class="pb-4">
                            <a class="popup-btn">Meer info</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- modal -->
    <div class="popup-view">
        <div class="popup-card">
            <a><i class="fas fa-times close-btn"></i></a>
            <div class="product-img">
                <img class="image" src="3.png" alt="">
            </div>
            <div class="info">
                <h2 class="name">Camera<br><span>Classic Camera</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex
                    ea commodo consequat.</p>
                <span class="price">$250.00</span>
                <a href="#" class="add-cart-btn">Add to Cart</a>
                <a href="#" class="add-wish">Add to Wishlist</a>
            </div>
        </div>
    </div>

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
        ]
    });

    $('.slider').on('mousewheel', function(e) {
        e.preventDefault();

        if (e.originalEvent.wheelDelta < 0) {
            $(this).slick('slickNext');
            // console.log('slickNext');
        } else {
            $(this).slick('slickPrev');
            // console.log('slickPrev');
        }
    });

    $(document).ready(function() {
        var $popupViews = $('.popup-view');
        var $popupBtns = $('.popup-btn');
        var $closeBtns = $('.close-btn');

        $($popupBtns).on('click', function() {
            $($popupViews).toggleClass('active');
        });

        $closeBtns.on("click", function() {
            $popupViews.removeClass('active');
        });
    });

    $('[data-toggle="modal"]').on('click', function(e) {
        var modalText = $(this).find('[data-content="name"]').text();
        var modalImage = $(this).find('[data-content="image"]').attr('src');
        var modalCode = $(this).find('[data-content="price"]').text();
        $('.name').text(modalText);
        $('.price').text(modalCode);
        $('.image').attr('src', modalImage);
        console.log(modalText + modalImage);
    });
</script>
