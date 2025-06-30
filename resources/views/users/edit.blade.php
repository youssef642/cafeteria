@extends('./layouts/app')
@section('title', 'Edit User')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit User</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="room">Room</label>
                <input type="text" class="form-control" value="{{ $user->room }}" id="room" name="room" required>
                @if ($errors->has('room'))
                    <span class="text-danger">{{ $errors->first('room') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Current Image:</label><br>
                @if($user->image)
                    <img src="{{ asset('images/' . $user->image) }}" width="100" height="100" alt="User Image">
                @else
                    <span class="text-muted">No image</span>
                @endif
            </div>
    
            <div class="mb-3">
                <label class="form-label">Change Image:</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="extension">Extension</label>
                <input type="text" class="form-control" value="{{ $user->extension }}" id="extension" name="extension" required>
                @if ($errors->has('extension'))
                    <span class="text-danger">{{ $errors->first('extension') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

