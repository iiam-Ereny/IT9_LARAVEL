<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicines Monitoring System</title>
    <link rel="stylesheet" href="{{ asset('frontend/login.css') }}">
</head>
<body>

    <div class="bg-images">
        <img src="{{ asset('img/design.png') }}" class="left-image">
        <img src="{{ asset('img/design1.png') }}" class="right-image">
    </div>

    <div class="login-container">
        <img src="{{ asset('img/LOGO1.png') }}">
        <h1>Medicines Monitoring System</h1>
        <hr>
        <h3>Admin Login</h3>

        <!-- Display any validation errors here -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>   
    </div>
</body>
</html>
