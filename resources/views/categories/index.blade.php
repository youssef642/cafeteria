<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">

        <a class="btn btn-success mb-3" href="{{ route('categories.create') }}">+ Create New Category</a>

        @if($categories->isEmpty())
            <div class="alert alert-warning">No categories found.</div>
        @else
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
