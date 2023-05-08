@extends('layouts/main')

@section('title')
    Brief and Readable
@endsection

@section('content')
    <div class="w-full grid md:grid-cols-2 xl:grid-cols-3 gap-4 p-3">

        {{-- first - left --}}
        <div class="w-full h-full mx-auto max-w-lg ">
            @include('pages.partials.about-hero')
        </div>

        {{-- second --}}
        <div class="w-full h-full mx-auto max-w-lg ">
            @include('pages.partials.portfolios-div')
            @include('pages.partials.create-div')
        </div>

        {{-- third --}}
        <div class="w-full h-full mx-auto max-w-lg ">
            @include('pages.partials.my-bars')
        </div>

        {{-- last --}}
        <div class="w-full h-full mx-auto max-w-lg ">
            @include('pages.partials.all-bars')
        </div>
    </div>
@endsection
