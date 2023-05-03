@extends('layouts/main')

@section('title')
    Add a BAR
@endsection


@section('content')
    <div class="w-full h-full mx-auto mt-5 max-w-xl ">
        <form method='POST' action='/bar' class="text-center bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            {{ csrf_field() }}
            <div class="mt-5">

                <div class="text-3xl text-emerald-500">About Your BAR</div>
            </div>

            <div class="my-5">
                <label for='name' class='block mb-2 text-sm font-medium text-gray-900'>Name of your BAR</label>
                <input type='text' name='name' test='name-input' value='{{ old('name') }}' autofocus
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'name'])
            </div>
            <div class="my-5">
                <label for='slug' class='block mb-2 text-sm font-medium text-gray-900'>Short URL (a unique
                    identifier)</label>
                <input type='text' name='slug' test='slug-input' value='{{ old('slug') }}' autofocus
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'slug'])
            </div>
            <div class="my-5">
                <label for='topic' class='block mb-2 text-sm font-medium text-gray-900'>Topic (e.g. School, Business,
                    Relationships, Facts)</label>
                <input type='text' name='topic' test='topic-input' value='{{ old('topic') }}' autofocus
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'topic'])
            </div>
            <div class="my-5">
                <input name="share" class="w-5 h-5 pt-4 " type="checkbox" value="1"
                    {{ old('share') ? 'checked' : '' }} />
                <label for="share" class="h-6 cursor-pointer select-none text-slate-700 pl-2">Make Shareable</label>
            </div>

            <div class="mt-12">
                <hr>
                <div class="text-3xl text-emerald-500">Page 1</div>
            </div>
            <div class="my-5">
                <label for='title1' class='block mb-2 text-sm font-medium text-gray-900'>Page 1 Header</label>
                <input type='text' name='title1' test='title1-input' value='{{ old('title1') }}' autofocus
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'title1'])
            </div>
            <div class="my-5">
                <label for='image1' class='block mb-2 text-sm font-medium text-gray-900'>Page 1 Image</label>
                <select name='image1'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                    <option value=''>Choose one...</option>
                    @foreach ($images as $image)
                        <option value='{{ $image->id }}' {{ old('image1') == $image->id ? 'selected' : '' }}>
                            {{ $image->name }}</option>
                    @endforeach
                </select>
                @include('includes.error-field', ['fieldName' => 'image1'])
            </div>
            <div class="my-5">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="content1">
                    Page 1 Content
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="content1" placeholder="Page contents" rows="5">{{ old('content1') }}</textarea>
                @include('includes.error-field', ['fieldName' => 'content1'])
            </div>


            <div class="mt-12">
                <hr>
                <div class="text-3xl text-emerald-500">Page 2</div>
            </div>
            <div class="my-5">
                <label for='title2' class='block mb-2 text-sm font-medium text-gray-900'>Page 2 Header</label>
                <input type='text' name='title2' test='title2-input' value='{{ old('title2') }}' autofocus
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'title2'])
            </div>
            <div class="my-5">
                <label for='image2' class='block mb-2 text-sm font-medium text-gray-900'>Page 2 Image</label>
                <select name='image2'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                    <option value=''>Choose one...</option>
                    @foreach ($images as $image)
                        <option value='{{ $image->id }}' {{ old('image2') == $image->id ? 'selected' : '' }}>
                            {{ $image->name }}</option>
                    @endforeach
                </select>
                @include('includes.error-field', ['fieldName' => 'image2'])
            </div>
            <div class="my-5">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="content2">
                    Page 2 Content
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="content2" placeholder="Page contents" rows="5">{{ old('content2') }}</textarea>
                @include('includes.error-field', ['fieldName' => 'content2'])
            </div>


            <button type='submit' test='search-button'
                class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
                Make it Brief and Readable</button>

            @if (count($errors) > 0)
                <ul class='text-red-500'>
                    Errors on Page. Please correct
                    {{-- @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach --}}
                </ul>
            @endif

        </form>
    </div>
@endsection
