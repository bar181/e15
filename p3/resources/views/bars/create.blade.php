@extends('layouts/main')

@section('title')
    Add a BAR
@endsection


@section('content')
    <div class="w-full h-full mx-auto mt-5 max-w-xl ">
        <form method='POST' action='/bars' class="text-center bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            {{ csrf_field() }}
            <div class="mt-5">

                <div class="text-3xl text-emerald-500">Your New BAR</div>
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
                <label for='image_id' class='block mb-2 text-sm font-medium text-gray-900'>Primary Image</label>
                <select name='image_id'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                    <option value=''>Choose one...</option>
                    @foreach ($images as $image)
                        <option value='{{ $image->id }}' {{ old('image_id') == $image->id ? 'selected' : '' }}>
                            {{ $image->name }}</option>
                    @endforeach
                </select>
                @include('includes.error-field', ['fieldName' => 'image_id'])
            </div>

            <div class="my-5">
                <label for='content1' class='block mb-2 text-sm font-medium text-gray-900'>Fun Fact 1 </label>
                <input type='text' name='content1' test='content1-input' value='{{ old('content1') }}'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field-generic', ['fieldName' => 'content1'])
            </div>
            <div class="my-5">
                <label for='content2' class='block mb-2 text-sm font-medium text-gray-900'>Fun Fact 2 </label>
                <input type='text' name='content2' test='content2-input' value='{{ old('content2') }}'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field-generic', ['fieldName' => 'content2'])
            </div>
            <div class="my-5">
                <label for='content3' class='block mb-2 text-sm font-medium text-gray-900'>Fun Fact 3 </label>
                <input type='text' name='content3' test='content3-input' value='{{ old('content3') }}'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field-generic', ['fieldName' => 'content3'])
            </div>


            <div class="my-5">
                <input name="share" class="w-5 h-5 pt-4 " type="checkbox" value="1"
                    {{ old('share') ? 'checked' : '' }} />
                <label for="share" class="h-6 cursor-pointer select-none text-slate-700 pl-2">Make Shareable</label>
            </div>

            <button type='submit' test='search-button'
                class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
                Create</button>

            @if (count($errors) > 0)
                <ul class='text-red-500'>
                    Errors on Page. Please correct
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        </form>
    </div>
@endsection
