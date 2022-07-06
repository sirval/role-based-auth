 @extends('layouts.app_master')
{{-- @include('sweetalert::alert') --}}
@php
    echo "This is the create page ";
@endphp

<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <input type="text" placeholder="firstname" name="fname">
    <input type="text" placeholder="lastname" name="lname">
    <button type="submit" name="submit">Submit</button>
</form>