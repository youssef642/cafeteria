<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User</title>
</head>
<body>
    <div class="container mt-5">
        
    <h2 class="mb-4">Users</h2>
    <a class="btn btn-success mb-3" href="{{ route('users.create') }}">Create User</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Room</th>
                <th>Image</th>
                <th>ext</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($users as $user)
                @php
                    $counter++;
                @endphp
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->room }}</td>
                    <td>
                        <img src="{{ asset('images/' . $user->image) }}" alt="{{ $user->name }}" width="100">
                    </td>
                    <td>{{ $user->extension }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </container>
</body>
</html>