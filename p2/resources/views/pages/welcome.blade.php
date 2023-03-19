@extends('layouts/main')

@section('title')
    Create a Postcard
@endsection

@section('content')
    <h1 class="text-2xl text-center font-bold py-5 ">POSTCARDS</h1>
    <div class="flex mb-4 gap-4 px-8 md:container md:mx-auto ">
        @foreach ($postcards as $postcard)
            <div class="w-1/4 ">
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                    <img class="w-full" src="{{ $postcard['image'] }}" alt="Postcard image">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $postcard['title'] }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $postcard['message'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        @if (isset($newPostcard))
            <div class="w-1/4 ">
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                    <img class="w-full" src="{{ $newPostcard['image'] }}" alt="Postcard image">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $newPostcard['title'] }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $newPostcard['message'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

    </div>


    <div class="w-full pt-8 max-w-md mx-auto">
        <form method='POST' action='/' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl text-center font-bold ">ADD A POSTCARD</h2>
            <div class='text-sm  pb-5 '>* Required fields</div>
            {{ csrf_field() }}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    * Postcard title
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="title" id="title" type="text" value='{{ old('title') }}'>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                    Message
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="message" placeholder="To Mom, Love Beadley" rows="5">{{ old('message') }}</textarea>

            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                    Select an image
                </label>
                <div class="flex gap-4 ">
                    <div class="w-1/4">
                        <input type='radio' name='imageType' id='cute' value='cute'
                            {{ old('imageType') == 'cute' || is_null(old('imageType')) ? 'checked' : '' }}>
                        <label for='title'> Cute</label>
                    </div>
                    <div class="w-1/4">
                        <input type='radio' name='imageType' id='sky' value='sky'
                            {{ old('imageType') == 'sky' ? 'checked' : '' }}>
                        <label for='author'> Sky</label>
                    </div>
                    <div class="w-1/4">
                        <input type='radio' name='imageType' id='college' value='college'
                            {{ old('imageType') == 'college' ? 'checked' : '' }}>
                        <label for='title'> College</label>
                    </div>
                    <div class="w-1/4">
                        <input type='radio' name='imageType' id='funny' value='funny'
                            {{ old('imageType') == 'funny' ? 'checked' : '' }}>
                        <label for='author'> Funny</label>
                    </div>
                </div>
            </div>
            <div class="mb-4 flex items-center">

                <input name="terms" class="w-5 h-5 pt-4 " type="checkbox" value="1"
                    {{ old('terms') ? 'checked' : '' }} />
                <label for="terms" class="h-6 cursor-pointer select-none text-slate-700 pl-2">I agree with
                    terms</label>

            </div>
            @if (count($errors) > 0)
                <div class="w-full mb-4 rounded-lg bg-red-200 py-2 px-6 text-base text-warning-800" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <div class="flex items-center justify-between">

                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type='submit'>
                    Create postcard
                </button>

            </div>
        </form>

    </div>
@endsection
