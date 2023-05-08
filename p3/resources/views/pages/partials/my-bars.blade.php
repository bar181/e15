<div class="w-full text-left bg-white shadow-md rounded px-4 pt-6 pb-4 mb-4">
    <div class='block pb-5 text-center w-full  text-2xl text-purple-700 '>My Work</div>
    @if (Auth::user())
        @if (count($myBars) > 0)
            <ul class="list-disc ">
                @foreach ($myBars as $bar)
                    <li class="flex justify-between border-b border-gray-400 py-3">
                        <div test='show-id-{{ $bar->id }}'>{{ $bar->name }}
                            @if ($bar->share)
                                <i class="text-green-500 fa fa-share-nodes pr-2"></i>
                            @else
                                <i class="text-red-700 fa fa-lock pr-2"></i>
                            @endif
                        </div>
                        <div class="flex px-2">
                            <a href='/bars/{{ $bar->slug }}'
                                class='flex text-white bg-emerald-500 hover:bg-emerald-700  px-2 py-1 text-center'>
                                <i class="fa fa-address-card py-1"></i><span
                                    class="pl-2 hidden lg:block">View</span></a>
                            <a href='/bars/{{ $bar->slug }}/edit'
                                class='flex mx-2 text-white bg-orange-500 hover:bg-orange-700 px-2 py-1 text-center'>
                                <i class="fa fa-edit py-1"></i><span class="pl-2 hidden lg:block">Edit</span></a>
                            <a href='/bars/{{ $bar->slug }}/delete' test='delete-button-{{ $bar->id }}'
                                class='flex text-white bg-red-500 hover:bg-orange-700  px-2 py-1 text-center'>
                                <i class="fa fa-times py-1"></i><span class="pl-2 hidden lg:block">Remove</span></a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class=" pt-4 font-small text-gray-400">
                Shareable <i class="text-green-500 fa fa-share-nodes pr-2"></i>,
                Private <i class="text-red-700 fa fa-lock pr-2"></i>
            </div>
        @else
            <p>No bars found.</p>
        @endif
    @else
        <div class='text-center'>
            <a href='/bars/create' test='login-mybars-link'
                class=' text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
                Login First
            </a>
        </div>
    @endif
</div>
