@extends('layouts.main')
@section('app', 'active')
@section('content')
    <div id = "app">
        <home-component :user_id="{{ Auth::user()->id }}" :token = "{ value: '{{ csrf_token() }}' }"></home-component>
        </div>
    </body>
</html>
