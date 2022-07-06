@extends('layouts.app_master')
@php
    echo 'This is update page';
@endphp

<form method="POST" action="{{ route('product.update',$item->id,'update') }}">
    @csrf
    @method('PUT')
    <input type="text" placeholder="firstname" name="fname" value="{{ $item->firstname }}">
    <input type="text" placeholder="lastname" name="lname" value="{{ $item->lastname }}">
    <button type="submit" name="submit">Submit</button>
    <a class="btn btn-sm" href="{{ route('product.index') }}">Back</a>
</form>