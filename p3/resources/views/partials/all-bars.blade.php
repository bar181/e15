<div class="w-full text-left bg-white shadow-md rounded px-4 pt-6 pb-8 mb-4">
    <div class='block pb-5 text-center w-full  text-2xl text-purple-700 '>Public Gallery {{ $searchDetails }}</div>
    @include('partials.search-bars')
    @if (count($allBars) > 0)
        <ul class="list-disc pt-5">
            @foreach ($allBars as $bar)
                <li class="flex justify-between border-b border-gray-400 py-3">
                    <div><span class="font-bold">{{ $bar->name }}</span> by {{ $bar->user->name }}</div>
                    <div>
                        <a href='/bars/{{ $bar->slug }}'
                            class='text-white bg-emerald-500 hover:bg-emerald-700  px-2 py-1 text-center'>
                            <i class="fa fa-address-card pr-2"></i>View</a>
                    </div>
                </li>
            @endforeach
            </ol>
        @else
            <p>No bars found.</p>
    @endif

</div>
