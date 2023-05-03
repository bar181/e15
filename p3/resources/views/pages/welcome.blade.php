@extends('layouts/main')

@section('title')
    Brief and Readable
@endsection

@section('content')



    <div class="w-full h-full mx-auto mt-5 max-w-lg ">
        <form method='GET' action='/search' class="text-center bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <h2 class="text-2xl text-center text-purple-500 font-bold py-5">Search for something BAR <br>(Brief and Readable)
            </h2>

            <div class="my-5">
                <label for='searchTerms' class='block mb-2 text-sm font-medium text-gray-900'>Search</label>
                <input type='text' name='searchTerms' test='search-input' value='{{ old('searchTerms') }}' autofocus
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'searchTerms'])
            </div>

            <div class="my-5">
                <label for='searchTerms' class='block  mb-2 text-sm font-medium text-gray-900'>Search Type</label>
                <input type='radio' name='searchType' id='topic' value='topic'
                    {{ old('searchType', 'topic') == 'topic' ? 'checked' : '' }}>
                <label for='topic'> Topic</label>

                <input type='radio' name='searchType' id='author' value='author' class='ml-5'
                    {{ old('searchType') == 'author' ? 'checked' : '' }}>
                <label for='author'> Author</label>
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
    </div>



    <a href='/bars/create'
        class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>Add
        a BAR</a>
@endsection
