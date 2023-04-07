@extends('layouts/main')

@section('title')
    Confirm delete book {{ $book->title }}
@endsection

@section('content')
    <h1>Delete</h1>
    <h2>{{ $book->title }}</h2>

    <form action='/books/'>
        <button type='submit' class='btn btn-primary'>Cancel</button>
    </form>

    <form method='POST' action='/books/{{ $book->slug }}'>
        <button type='submit' class='btn btn-danger'>Yes Delete Book</button>
        {{ csrf_field() }}
        {{ method_field('delete') }}
    </form>
@endsection
