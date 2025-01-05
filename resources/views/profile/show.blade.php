<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}'s Profile</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <!-- Display profile picture -->
                <img src="{{ asset('storage/' . $user->profile_picture_url) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <h1>{{ $user->name }}</h1>
                <p>Email: {{ $user->email }}</p>
                <p>Joined: {{ $user->created_at->format('M d, Y') }}</p>
                
                <!-- Admin users or the profile owner can see the edit button -->
                @if (Auth::check() && (Auth::id() === $user->id || Auth::user()->is_admin))
                    <a href="{{ route('profile.edit', $user) }}" class="btn btn-primary">Edit Profile</a>
                @endif

                <!-- Other profile details can be added here -->
            </div>
        </div>
    </div>

</body>
</html>
