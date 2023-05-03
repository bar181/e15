@extends('layouts/main')

@section('title')
    Login
@endsection

@section('content')
    <div class="w-full h-full mx-auto mt-12 max-w-md ">
        <form method='POST' action='/login' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            {{ csrf_field() }}
            <h2 class="text-2xl text-center font-bold py-5">Welcome back ! </h2>
            <h1 class="text-xl text-center py-5">Login to create your BAR presentation (Brief and Readable)</h1>

            <div class="mb-5">
                <label class="block text-gray-700 text-sm  mb-2" for="title">
                    Don’t have an account yet? <a href='/register' class="text-blue-700 underline">Click here to get
                        started</a>
                </label>
            </div>

            <div class="my-5">
                <label for='email' class='block mb-2 text-sm font-medium text-gray-900'>E-Mail Address</label>
                <input test='email-input' id='email' type='email' name='email' value='{{ old('email') }}' autofocus
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'email'])

            </div>
            <div class="mb-5">
                <label for='password' class='block mb-2 text-sm font-medium text-gray-900'>Password</label>
                <input test='password-input' id='password' type='password' name='password'
                    class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'>
                @include('includes.error-field', ['fieldName' => 'password'])
            </div>
            <div class="mb-5">
                <label>
                    <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
            <div>
                <button type='submit' test='login-button'
                    class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center'>
                    Login</button>
            </div>

        </form>
    </div>
@endsection
