@extends('layouts/main')

@section('title')
    Brief and Readable
@endsection

@section('content')
    <div class="w-full grid grid-cols-2 gap-4 p-3">

        {{-- left --}}
        <div class="w-full h-full mx-auto max-w-lg ">
            @include('partials.about-hero')
            @include('partials.search-bars')
            @include('partials.all-bars')
        </div>

        {{-- right --}}
        <div class="w-full h-full mx-auto max-w-lg ">
            @include('partials.create-div')
            @include('partials.my-bars')
        </div>
    </div>
@endsection
