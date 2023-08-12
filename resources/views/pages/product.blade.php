@extends('layouts.app')
@section('food','menu-open')
@section('food.active','active')
@section('product','active')
@section('content')
    <div id = "app">
        <product-component :token = "{ value: '{{ csrf_token() }}' }"></product-component>
    </div>
@endsection
