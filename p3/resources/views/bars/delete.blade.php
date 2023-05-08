@extends('layouts/main')

@section('title')
    Confirm deletion:
@endsection

@section('content')
    <div class="w-full h-full mx-auto mt-5 max-w-xl ">

        <div class="mt-5">
            <p>Are you sure you want to delete <strong>{{ $bar->name }}</strong>?</p>

            <form method='POST' action='/bars/{{ $bar->slug }}'>
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="mt-5">
                    <button type='submit' test='confirm-delete-button'
                        class='text-white bg-red-500 hover:bg-orange-700  px-2 py-1 text-center'>Yes, delete it!</button>
                </div>
            </form>

            <div class="mt-5">
                <a href='/bars/' class='text-white bg-emerald-500 hover:bg-emerald-700  px-2 py-1 text-center'>No, I changed
                    my mind.</a>
            </div>
        </div>

    </div>
@endsection
