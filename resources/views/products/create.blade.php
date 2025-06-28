<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }
        .form-label {
            font-weight: 600;
        }
        .btn-add-category {
            white-space: nowrap;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card p-4 bg-white">
                <h2 class="mb-4 text-center text-primary"> Add New Product</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>There were some errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label"> Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label"> Price (EGP)</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"> Category</label>
                        <div class="d-flex gap-2">
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old("category_id") == $category->id ? "selected" : "" }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary btn-add-category">
                                Add Category
                            </a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label"> Product Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between">

                        <button type="submit" class="btn btn-success">Create Product</button>
                         <a href="{{ route('products.index') }}" class="btn btn-secondary">← Back</a>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

</body>
</html>
