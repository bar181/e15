<div class="w-full text-left bg-white shadow-md rounded px-4 pt-6 pb-8 mb-4">
    <div class='block pb-5 text-center w-full  text-2xl text-purple-700 '>My Work</div>
    @if (Auth::user())
        @if (count($myBars) > 0)
            <ul class="list-disc ">
                @foreach ($myBars as $bar)
                    <li class="flex justify-between border-b border-gray-400 py-3">
                        <div>{{ $bar->name }}
                            @if ($bar->share)
                                <i class="fa fa-share-nodes pr-2"></i>
                            @endif
                        </div>
                        <div>
                            <a href='/bars/{{ $bar->slug }}'
                                class='text-white bg-emerald-500 hover:bg-emerald-700  px-2 py-1 text-center'>
                                <i class="fa fa-address-card pr-2"></i>View</a>
                            <a href='/bars/{{ $bar->slug }}/edit'
                                class='text-white bg-orange-500 hover:bg-orange-700  px-2 py-1 text-center'>
                                <i class="fa fa-edit pr-2"></i>Edit</a>
                        </div>
                    </li>
                @endforeach
                </ol>
            @else
                <p>No bars found.</p>
        @endif
    @else
        <div class='text-center'>
            <a href='/bars/create' test='login-mybars-link'
                class=' text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
                Login First</a>
            <div>
    @endif
</div>
