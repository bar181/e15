@extends('layouts/main')

@section('title')
    Filter Books
@endsection


@section('content')
    Let's filter and find some books on <br>
    category {{ $category }} <br>
    subcategory {{ $subcategory }} <br>
    <p>
        Sounds like a plan ... but we'll wait for DB setup
    </p>
@endsection
