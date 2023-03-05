<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'Project 2')</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='/css/style.css' rel='stylesheet'>

    @yield('head')
</head>

<body>
    @include('layouts/nav')
    <header>
        I am the Header
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; E15 Project 2, Bradley Ross
    </footer>

</body>

</html>
