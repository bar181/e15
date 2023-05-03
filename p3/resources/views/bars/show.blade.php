@extends('layouts/main')

@section('head')
    <link href='/css/books/show.css' rel='stylesheet'>
@endsection

@section('content')
    @if (!$bar)
        BAR not found. <a href='/bars'>Check out the other BARs</a>
    @else
        {{ $bar }}
    @endif
@endsection
