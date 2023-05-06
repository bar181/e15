@extends('layouts/main')

@section('title')
    Brief and Readable
@endsection

@section('content')
    <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-4 p-3">

        {{-- first - left --}}
        <div class="w-full h-full mx-auto max-w-lg ">
            @include('partials.about-hero')
        </div>

        {{-- second - lg is middle --}}
        <div class="w-full h-full mx-auto max-w-lg ">
            @include('partials.create-div')
            @include('partials.my-bars')
        </div>

        {{-- last - lg is right / md is bottom --}}
        <div class="w-full h-full mx-auto max-w-lg ">
            @include('partials.all-bars')
        </div>
    </div>
@endsection
