<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    @foreach ($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Price: {{ $product->price }}</p>
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
            <p>Color: {{ $product->color }}</p>
            <p>Dimensions: {{ $product->height_cm }}cm x {{ $product->width_cm }}cm x {{ $product->depth_cm }}cm</p>
            <p>Weight: {{ $product->weight_gr }}g</p>
        </div>
    @endforeach
</body>
</html>
