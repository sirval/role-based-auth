@extends('layouts.app')
@section('css')
{{-- css links goes here --}}
@endsection
@section('content')
{{-- main page content gooes here --}}
<h1>{{ auth()->user()->role_id }}</h1>
@endsection
@section('script')
{{-- js scripts goes here --}}
@endsection