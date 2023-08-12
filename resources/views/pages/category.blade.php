@extends('layouts.app')
@section('food','menu-open')
@section('food.active','active')
@section('category','active')
@section('content')
    <div id = "app">
        <category-component :token = "{ value: '{{ csrf_token() }}' }"></category-component>
    </div>
@endsection
