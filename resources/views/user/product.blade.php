@include('front.layouts.header')

<div class="flex">
    @foreach ($categories as $category)
        <li><a class="pl-4 flex top-24 relative gap-20 text-blue-500 hover:text-blue-800"
                href="{{ route('winkel.index') }}?category_id={{ $category->id }}">{{ $category->name }}</a>
        </li>
    @endforeach
</div>

<div class="top-36 relative">
    <h2 class="font-medium text-3xl text-center">Winkel</h2>
</div>

<section class="pt-36 pb-20 pl-3 grid grid-cols-[250px_auto]">
    <div class="border-2 h-auto p-4 top-8 flex flex-col">
        <h3 class="font-medium text-2xl text-center pb-6">Fillteren</h3>
        <div class="pl-4 pb-4">
            <span>Prijs &euro;</span>
            <div class="relative mb-6">
                <input id="labels-range-input" type="range" value="1000" min="100" max="1500"
                    class="w-full h-2 bg-[#c6d1cc] rounded-lg appearance-none cursor-pointer">
                <span class="text-sm text-[-gray-500] absolute start-0 -bottom-6">Min ($100)</span>
                <span class="text-sm text-gray-500 absolute end-0 -bottom-6">Max ($1500)</span>
            </div>
        </div>
        <div class="pl-4 pb-4">
            <span>Kleur</span>
            <div class="color-pallete flex gap-2">
                <div class="bg-[#b71414] w-[21px] h-[16px]"></div>
                <div class="bg-[#ebff00] w-[21px] h-[16px]"></div>
                <div class="bg-[#0b5b04] w-[21px] h-[16px]"></div>
                <div class="bg-[#0501b0] w-[21px] h-[16px]"></div>
                <div class="bg-[#9d08aa] w-[21px] h-[16px]"></div>
                <div class="bg-[#ffb800] w-[21px] h-[16px]"></div>
            </div>
        </div>
        <div class="pl-4 pb-4">
            <span>Hoogte</span>
            <div class="relative mb-6">
                <input id="labels-range-input" type="range" value="1000" min="100" max="1500"
                    class="w-full h-2 bg-[#c6d1cc] rounded-lg appearance-none cursor-pointer">
                <span class="text-sm text-gray-500 absolute start-0 -bottom-6">Min ($100)</span>
                <span class="text-sm text-gray-500 absolute end-0 -bottom-6">Max ($1500)</span>
            </div>
        </div>
        <div class="pl-4 pb-4">
            <span>Breedte</span>
            <div class="relative mb-6">
                <input id="labels-range-input" type="range" value="1000" min="100" max="1500"
                    class="w-full h-2 bg-[#c6d1cc] rounded-lg appearance-none cursor-pointer">
                <span class="text-sm text-gray-500 absolute start-0 -bottom-6">Min ($100)</span>
                <span class="text-sm text-gray-500 absolute end-0 -bottom-6">Max ($1500)</span>
            </div>
        </div>
        <div class="pl-4 pb-4">
            <span>Diepte</span>
            <div class="relative mb-6">
                <input id="labels-range-input" type="range" value="1000" min="100" max="1500"
                    class="w-full h-2 bg-[#c6d1cc] rounded-lg appearance-none cursor-pointer">
                <span class="text-sm text-gray-500 absolute start-0 -bottom-6">Min ($100)</span>
                <span class="text-sm text-gray-500 absolute end-0 -bottom-6">Max ($1500)</span>
            </div>
        </div>
        <div class="pl-4 pb-4">
            <span>Gewicht</span>
            <div class="relative mb-6">
                <input id="labels-range-input" type="range" value="1000" min="100" max="1500"
                    class="w-full h-2 bg-[#c6d1cc] rounded-lg appearance-none cursor-pointer">
                <span class="text-sm text-gray-500 absolute start-0 -bottom-6">Min ($100)</span>
                <span class="text-sm text-gray-500 absolute end-0 -bottom-6">Max ($1500)</span>
            </div>
        </div>
    </div>

    <div>
        <div class="p-12 grid grid-cols-3">
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
    </div>
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
    {{-- <div class="text-right p-4 py-10">
        {{ $products->links() }}
    </div> --}}
</section>
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


@include('front.layouts.footer')
