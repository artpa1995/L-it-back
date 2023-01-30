<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="../css/app.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
<!-- <p>header</p> -->
<header>
    
</header>

<div class="login_form">
    <form method="POST" action="{{route('login_form')}}">
        @csrf
        <input type="text" name="login"  autocomplete="login" autofocus>
        <input type="password" name="password"  autocomplete="current-password">
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

    </body>
</html>
