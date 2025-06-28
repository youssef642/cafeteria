<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Product Details</h2>

    <div class="card" style="width: 24rem;">
        @if($product->image)
            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="Product Image">
        @else
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="No Image">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text"><strong>Price:</strong> {{ number_format($product->price, 2) }} EGP</p>
            <p class="card-text"><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>

            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

</body>
</html>
