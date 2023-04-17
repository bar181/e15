@extends('layouts/main')

@section('title')
    Add an Author
@endsection

@section('content')
    <h1>Add an Author</h1>





    <form method='POST' action='/author'>
        <div class='details'>* Required fields</div>

        {{ csrf_field() }}
        <label for='first_name'>* First Name</label>
        <input type='text' name='first_name' id='first_name' value='{{ old('first_name') }}'>
        @include('includes/error-field', ['fieldName' => 'first_name'])

        <label for='last_name'>* Last Name</label>
        <input type='text' name='last_name' id='last_name' value='{{ old('last_name') }}'>
        @include('includes/error-field', ['fieldName' => 'last_name'])

        <label for='birth_year'>* Birth Year (YYYY)</label>
        <input type='text' name='birth_year' id='birth_year' value='{{ old('birth_year') }}'>
        @include('includes/error-field', ['fieldName' => 'birth_year'])

        <label for='bio_url'>Biography URL</label>
        <input type='text' name='bio_url' id='bio_url' value='{{ old('bio_url', 'http://') }}'>
        @include('includes/error-field', ['fieldName' => 'bio_url'])

        <button type='submit' class='btn btn-primary'>Add Author</button>


        @if (count($errors) > 0)
            <div class='alert alert-danger'>
                Please correct the above errors.
            </div>
        @endif
    </form>

    <div class="mt-5">
        <hr>
    </div>
    <h3> Author List</h3>
    @if (count($authors) == 0)
        <p>No authors available yet</p>
    @else
        <div id='authors'>
            <ol>
                @foreach ($authors as $author)
                    <li class="text-start">{{ $author->first_name }} {{ $author->last_name }},
                        <span class="ps-2"> Born: {{ $author->birth_year }}</span>
                        <span class="ps-2">Bio: <a class='book' href='{{ $author->bio_url }}'>
                                {{ $author->bio_url }}</a> </span>
                    </li>
                @endforeach
            </ol>
        </div>
    @endif
@endsection
