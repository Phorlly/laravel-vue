@extends('layouts.app')
@section('customer','active')
@section('content')
        <div id = "app">
            <customer-component :token = "{ value: '{{ csrf_token() }}' }"></customer-component>
        </div>
@endsection

