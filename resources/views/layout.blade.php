<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Blog')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <ul class="menu">
        <li><a class="{{ request()->routeIs('home') ? 'active':'' }}" href="{{ route('home') }}">Home</a></li>
        <li><a class="{{ request()->routeIs('posts.create') ? 'active':'' }}" href="{{ route('posts.create') }}">post create</a></li>
    </ul>

    @if (session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <div class="error-message">{{ $error }}</div>
        @endforeach
    @endif

    @yield('content')
</body>
</html>