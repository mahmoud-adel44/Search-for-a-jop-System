@extends('layout')

@section('title')
view resumes
@endsection


@section('home')
<li class="nav-item">
<a class="nav-link" href="{{route('students.index')}}">Home</a>
</li>
@endsection


@section('content')
<x-resumes></x-resumes> 
@endsection
