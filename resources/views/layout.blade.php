<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Blog')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

<div class="container">

    <ul class="menu">
        <li><a class="{{ request()->routeIs('home') ? 'active':'' }}" href="{{ route('home') }}">Home</a></li>
        <li><a class="{{ request()->routeIs('posts.create') ? 'active':'' }}" href="{{ route('posts.create') }}">post create</a></li>
    </ul> 
    @includeWhen(session('success'),'_success')
    @includeWhen($errors->any(),'_errors')
    
    @yield('content')
</div>
</body>
</html>