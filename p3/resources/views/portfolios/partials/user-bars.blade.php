<div class="w-full text-left bg-white shadow-md rounded px-4 pt-6 pb-4 mb-4">
    <div class='block pb-5 text-center w-full  text-2xl text-purple-700 '>Works by {{ $name }}</div>
    @if (count($bars) > 0)
        <ul class="list-disc ">
            @foreach ($bars as $bar)
                <li class="flex justify-between border-b border-gray-400 py-3">
                    <div test='show-id-{{ $bar->id }}'>{{ $bar->name }}
                    </div>
                    <div>
                        <a href='/bars/{{ $bar->slug }}' test='bar-{{ $bar->id }}-link'
                            class='text-white bg-emerald-500 hover:bg-emerald-700  px-2 py-1 text-center'>
                            <i class="fa fa-address-card pr-2"></i>View</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No bars found.</p>
    @endif

</div>
