@extends('layouts/main')

@section('title')
    Bookmark Contact us
@endsection


@section('content')
    <h1>I am the contact page</h1>
    <h2> Email {{ config('mail.contact_email') }}</h2>
@endsection
