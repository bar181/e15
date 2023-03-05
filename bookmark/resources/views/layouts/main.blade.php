<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'Bookmark')</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='/css/bookmark.css' rel='stylesheet'>

    @yield('head')
</head>

<body>
    @include('layouts/nav')
    <header>
        <a href='/'><img src='/images/bookmark-logo@2x.png' id='logo' alt='bookmark Logo'></a>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; Bookmark, Inc.
    </footer>

</body>

</html>
