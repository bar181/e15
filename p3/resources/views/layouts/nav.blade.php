<nav class="flex items-center justify-between flex-wrap bg-blue-700 p-2">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a href="/">
            <span class="font-semibold text-xl tracking-tight hover:text-gray-200">Brief and Readable</span>
        </a>

    </div>
    <div class="block lg:hidden">
        <button
            class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-white">
        <div class="text-sm lg:flex-grow">
            @if (Auth::user())
                Welcome {{ Auth::user()->name }}

                <span class="px-5"> </span>
                <a href='/' test='nav-home-link'
                    class="inline-block text-sm px-2 py-2  text-white mt-4 lg:mt-0">Home | </a>
                <a href='/portfolios/' test='nav-mybars-link'
                    class="inline-block text-sm px-2 py-2  text-white mt-4 lg:mt-0">Portfolios | </a>
                <a href='/bars/' test='nav-mybars-link'
                    class="inline-block text-sm px-2 py-2  text-white mt-4 lg:mt-0">My Work | </a>
                <a href='/bars/create' test='nav-create-link'
                    class="inline-block text-sm px-2 py-2  text-white mt-4 lg:mt-0">Create | </a>
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
