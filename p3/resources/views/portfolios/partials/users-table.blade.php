<div class="w-full text-left bg-white shadow-md rounded px-4 pt-6 pb-4 mb-4">
    <div class='block pb-5 text-center w-full  text-2xl text-purple-700 '>Top Portfolios</div>
    @if (count($portfolios) > 0)
        <table class="min-w-full text-left text-sm font-light" test='portfolio-table-div'>
            <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                <tr>
                    <th scope="col" class="px-6 py-4 text-left">Name</th>
                    <th scope="col" class="px-6 py-4 text-center">Works</th>
                    <th scope="col" class="px-6 py-4 text-center">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $portfolio)
                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
                        <td class="whitespace-nowrap px-6 py-4 text-left ">{{ $portfolio->user->name }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-center">{{ $portfolio->share_count }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-center">
                            <a href='/portfolios/{{ $portfolio->user->id }}'
                                test='portfolio-{{ $portfolio->user->id }}-link'
                                class='text-white bg-emerald-500 hover:bg-emerald-700 px-2 py-1 text-center'>
                                <i class="fa fa-address-card pr-2"></i>View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No portfolios found.</p>
    @endif
</div>
