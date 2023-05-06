    <form method='GET' action='/search' class="w-full text-center ">
        <div class="">
            <input type='text' name='searchTerms' test='search-input' value='{{ old('searchTerms') }}' autofocus
                class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
            @include('includes.error-field', ['fieldName' => 'searchTerms'])
        </div>

        <div class="my-2">
            {{-- <label for='searchTerms' class='block  mb-2 text-sm font-medium text-gray-900'>Search Type</label> --}}
            <input type='radio' name='searchType' id='topic' value='topic'
                {{ old('searchType', 'topic') == 'topic' ? 'checked' : '' }}>
            <label for='topic'> Topic</label>

            <input type='radio' name='searchType' id='name' value='name' class='ml-5'
                {{ old('searchType') == 'name' ? 'checked' : '' }}>
            <label for='name'> Name</label>
        </div>

        <button type='submit' test='search-button'
            class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
            Search</button>

        @if (count($errors) > 0)
            <ul class='text-red-500'>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
