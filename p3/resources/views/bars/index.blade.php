@extends('layouts/main')

@section('title')
    My BARs
@endsection


@section('content')
    <div class="w-full flex justify-between p-5">
        <div>
            <a href='/' class='text-white bg-green-500 hover:bg-green-700  px-2 py-1 text-center'>
                <i class="fa fa-home pr-2"></i>Back</a>
        </div>

    </div>
    <div class="w-full h-full mx-auto mt-5 max-w-xl ">

        <div class="mt-5">
            <div class=" text-center pb-5 text-3xl text-emerald-500">What you've created</div>
            @include('partials.my-bars')

        </div>

    </div>
@endsection
