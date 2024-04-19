@include('front.layouts.header')

{{-- @section('IndexMain') --}}
<section class="home" id="home">
    <div class="home__container container grid grid-cols-2">
        <div id="home__img"></div>

        <div class="home__data">
            <h1 class="home__title">
                Planten zullen het maken <br> je leven beter
            </h1>
            <p class="home__description">
                Creëer een ongelooflijk plantontwerp voor uw kantoren of appartementen. Voeg frisheid toe aan uw nieuwe
                ideeën.
            </p>

            <a href="" class="button button--flex">
                Ontdekken <i class="ri-arrow-right-down-line button__icon"></i>
            </a>
        </div>
    </div>
</section>

<section>
    <h2 class="font-medium text-3xl text-center">Producten</h2>
    <div class="slider p-12">
        @foreach ($products as $product)
            <div class="product-card p-3 flex items-center flex-col" data-toggle="modal">
                <img data-content="image" class="rounded-t-md product-img w-[300px] h-[200px]"
                    src="{{ $product->image }}" alt="{{ $product->name }}">
                <div class="pt-8 flex flex-col">
                    <div class="pb-4" data-content="name">
                        <p class="name truncate">{{ $product->name }}</p>
                    </div>
                    <div class="hidden pb-4" data-content="description">
                        <p class="description truncate">{{ $product->description }}</p>
                    </div>
                    <div data-content="price" class="pb-4">
                        <b class="price">&euro; {{ $product->final_price }}</b>
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
            <img class="image" src="" alt="">
        </div>
        <div class="info">
            <h2 class="name"></h2>
            <p class="description"></p>
            <span class="price"></span>
            <a href="#" class="add-cart-btn">Toevoegen &nbsp; <i class="ri-shopping-cart-line"></i></a>
        </div>
    </div>
</div>
{{-- @endsection('IndexMain') --}}

@include('front.layouts.footer')
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
</script>
