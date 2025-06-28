<!DOCTYPE html>
<html>
<head>
    <title>Category Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Category Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name:</h5>
            <p class="card-text">{{ $category->name }}</p>
        </div>
    </div>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>

</body>
</html>
