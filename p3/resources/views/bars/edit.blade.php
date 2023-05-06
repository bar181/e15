@extends('layouts/main')

@section('title')
    Edit BAR
@endsection


@section('content')
    <div class="w-full grid md:grid-cols-2  gap-4 p-3 mb-8">
        {{-- left --}}
        <div class="w-full">
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

                <div class="my-5 bg-gray-200 p-4">
                    <div class='block mb-2 text-sm font-medium text-gray-900'>First Content Page</div>
                    <textarea name='content1' test='content1-input'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'
                        rows="3">{{ old('content1', $bar->content1) }}</textarea>
                    @include('includes.error-field-generic', ['fieldName' => 'content1'])
                    <label for='image1_id' class='block mb-2 mt-4 text-sm font-medium text-gray-900'>Image</label>
                    <select name='image1_id' test='image1_id-dropdown'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                        <option value=''>Choose one...</option>
                        @foreach ($images as $image)
                            <option value="{{ $image->id }}" @if (old('image1_id') == $image->id || (!old('image1_id') && $bar->image1 && $bar->image1->id == $image->id)) selected @endif>
                                {{ $image->name }}
                            </option>
                        @endforeach
                    </select>
                    @include('includes.error-field-generic', ['fieldName' => 'image1_id'])
                </div>

                <div class="my-5 bg-gray-200 p-4">
                    <div class='block mb-2 text-sm font-medium text-gray-900'>Second Content Page</div>
                    <textarea name='content2' test='content2-input'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'
                        rows="3">{{ old('content2', $bar->content2) }}</textarea>
                    @include('includes.error-field-generic', ['fieldName' => 'content2'])
                    <label for='image2_id' class='block mb-2 mt-4 text-sm font-medium text-gray-900'>Image</label>
                    <select name='image2_id' test='image2_id-dropdown'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                        <option value=''>Choose one...</option>
                        @foreach ($images as $image)
                            <option value="{{ $image->id }}" @if (old('image2_id') == $image->id || (!old('image2_id') && $bar->image2 && $bar->image2->id == $image->id)) selected @endif>
                                {{ $image->name }}
                            </option>
                        @endforeach
                    </select>
                    @include('includes.error-field-generic', ['fieldName' => 'image2_id'])
                </div>

                <div class="my-5 bg-gray-200 p-4">
                    <div class='block mb-2 text-sm font-medium text-gray-900'>Final Content Page</div>
                    <textarea name='content3' test='content3-input'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'
                        rows="3">{{ old('content3', $bar->content3) }}</textarea>
                    @include('includes.error-field-generic', ['fieldName' => 'content3'])
                    <label for='image3_id' class='block mb-2 mt-4 text-sm font-medium text-gray-900'>Image</label>
                    <select name='image3_id' test='image3_id-dropdown'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                        <option value=''>Choose one...</option>
                        @foreach ($images as $image)
                            <option value="{{ $image->id }}" @if (old('image3_id') == $image->id || (!old('image3_id') && $bar->image3 && $bar->image3->id == $image->id)) selected @endif>
                                {{ $image->name }}
                            </option>
                        @endforeach
                    </select>
                    @include('includes.error-field-generic', ['fieldName' => 'image3_id'])
                </div>

                <div class="my-5">
                    <input name="share" class="w-5 h-5 pt-4 " type="checkbox" value="1" test='share-checkbox'
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
                        <button type='submit' test='edit-bar-button'
                            class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
                            Save and Continue</button>
                    </div>
                </div>


                @if (count($errors) > 0)
                    <ul class='text-red-500' test='error-global'>
                        Errors on Page. Please correct
                        {{-- @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach --}}
                    </ul>
                @endif

            </form>
        </div>
        {{-- right --}}
        <div class="">
            <div class="text-xl text-emerald-500 pb-5">Image Gallery</div>

            <div class="w-full grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-1">

                @foreach ($images as $image)
                    <div class="w-full max-w-[200px] text-center">
                        <img class="inset-0 w-full mx-auto rounded-2xl" src="{{ $image->src }}" alt="report image" />
                        {{ $image->name }}
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
