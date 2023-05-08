<nav class="flex items-center justify-between flex-wrap bg-blue-700 p-2">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a href="/">
            <span class="font-semibold text-xl tracking-tight hover:text-gray-200">Brief and Readable</span>
        </a>

    </div>

    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-white">
        <div class="text-sm flex flex-grow">
            @if (Auth::user())
                <span class="px-5 py-2  hidden lg:block"> Welcome {{ Auth::user()->name }}</span>
                <a href='/' test='nav-home-link' class="inline-block text-sm px-2 py-2  text-white mt-4 lg:mt-0">|
                    Home |</a>
                <a href='/portfolios/' test='nav-mybars-link'
                    class="px-5 hidden lg:block inline-block text-sm px-2 py-2  text-white mt-4 lg:mt-0">| Portfolios
                    |</a>
                <a href='/bars/' test='nav-mybars-link'
                    class="px-5 hidden lg:block inline-block text-sm px-2 py-2  text-white mt-4 lg:mt-0">| My Work |
                </a>
                <a href='/px-5 hidden lg:block bars/create' test='nav-create-link'
                    class="inline-block text-sm px-2 py-2  text-white mt-4 lg:mt-0"> | Create |</a>
            @endif
        </div>

        <div>
            @if (!Auth::user())
                <a href='/login' test='nav-login-link'
                    class="inline-block text-sm px-4 py-2  text-white mt-4 lg:mt-0">Login</a>
            @else
                <form method='POST' id='logout' action='/logout'>
                    {{ csrf_field() }}
                    <button type='submit' class="inline-block text-sm px-4 py-2  text-white mt-4 lg:mt-0"
                        test='logout-button'>
                        Logout
                    </button>
                </form>
            @endif
        </div>


    </div>
</nav>
