@include('front.layouts.header')

<div class="border-2 w-11 left-0 top-8">
    <h2 class="font-medium text-3xl text-center">Producten</h2>
</div>

<section>
    <h2 class="font-medium text-3xl text-center">Producten</h2>
    <div class="p-12 grid grid-cols-3">
        @foreach ($products as $product)
            <div class="product-card p-3 flex items-center flex-col" data-toggle="modal">
                <img data-content="image" class="rounded-t-md product-img w-[300px] h-[200px]" src="{{ $product->image }}"
                    alt="{{ $product->name }}">
                <div class="pt-8 flex flex-col">
                    <div class="pb-4" data-content="name">
                        <p class="name truncate">{{ $product->name }}</p>
                    </div>
                    <div class="hidden pb-4" data-content="description">
                        <p class="description truncate">{{ $product->description }}</p>
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
    <div class="text-right p-4 py-10">
        {{ $products->links() }}
    </div>
</section>


@include('front.layouts.footer')
