<div class="w-full text-center mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class='block pb-5 text-2xl text-purple-700 '>Portfolios</div>

    @if (Auth::user())
        <a href='/portfolios' test='portfolios-index-link'
            class=' text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
            View Other Portfolios</a>
    @else
        <a href='/bars/create' test='login-create-link'
            class=' text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
            Login First</a>
    @endif
</div>
