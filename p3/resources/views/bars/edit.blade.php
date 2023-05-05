@extends('layouts/main')

@section('title')
    Edit BAR
@endsection


@section('content')

    <div class="w-full h-full mx-auto mt-5 md:w-[860px] xl:w-[1120px] ">
        <form method='POST' action='/bars/{{ $bar->slug }}'
            class="text-center bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            {{ csrf_field() }}
            {{ method_field('put') }}

            <div class="mt-5">

                <div class="text-3xl text-emerald-500">Edit Your BAR</div>
            </div>

            <div class="my-5">
                <label for='name' class='block mb-2 text-sm font-medium text-gray-900'>Name of your BAR</label>
                <input type='text' name='name' test='name-input' value='{{ old('name', $bar->name) }}' autofocus
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'name'])
            </div>
            <div class="my-5">
                <label for='slug' class='block mb-2 text-sm font-medium text-gray-900'>Short URL (a unique
                    identifier)</label>
                <input type='text' name='slug' test='slug-input' value='{{ old('slug', $bar->slug) }}'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'slug'])
            </div>
            <div class="my-5">
                <label for='topic' class='block mb-2 text-sm font-medium text-gray-900'>Topic (e.g. School, Business,
                    Relationships, Facts)</label>
                <input type='text' name='topic' test='topic-input' value='{{ old('topic', $bar->topic) }}'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'topic'])
            </div>

            <div class="my-5">
                <label for='image_id' class='block mb-2 text-sm font-medium text-gray-900'>Primary Image</label>
                <select name='image_id'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                    <option value=''>Choose one...</option>


                    @foreach ($images as $image)
                        <option value="{{ $image->id }}" @if (old('image_id') == $image->id || (!old('image_id') && $bar->image && $bar->image->id == $image->id)) selected @endif>
                            {{ $image->name }}
                        </option>
                    @endforeach
                </select>
                @include('includes.error-field', ['fieldName' => 'image_id'])
            </div>

            <div class="my-5">
                <input name="share" class="w-5 h-5 pt-4 " type="checkbox" value="1"
                    {{ old('share', $bar->share) ? 'checked' : '' }} />
                <label for="share" class="h-6 cursor-pointer select-none text-slate-700 pl-2">Make Shareable</label>
            </div>

            <div class="w-full flex justify-between pt-3">
                <div>
                    <a href='/'
                        class='text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
                        <i class="fa fa-home pr-2"></i>Cancel</a>
                </div>
                <div>
                    <button type='submit' test='search-button'
                        class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
                        Save and Continue</button>
                </div>
            </div>


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
