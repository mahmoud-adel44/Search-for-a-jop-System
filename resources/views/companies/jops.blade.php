@extends('layout')

@section('title')
view resumes
@endsection


@section('home')
<li class="nav-item">
<a class="nav-link" href="{{route('companies.index')}}">Home</a>
</li>
@endsection


@section('content')
<x-jops></x-jops> 
@endsection
