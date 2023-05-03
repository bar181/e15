<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href='/css/style.css' rel='stylesheet'>

    @yield('head')
</head>

<body class="h-full bg-gray-100">

    @include('layouts.nav')

    @if (session('flash-alert'))
        <div class='flash-alert'>
            {{ session('flash-alert') }}
        </div>
    @endif

    <section id='main' class="w-full h-full ">
        @yield('content')
    </section>


    @include('layouts.footer')

</body>

</html>
