<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'Project 2')</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <link href='/css/style.css' rel='stylesheet'>

    @yield('head')
</head>

<body>

    <header>
        @include('layouts/nav')
        @yield('header')
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; E15 Project 2, Bradley Ross
    </footer>

</body>

</html>
