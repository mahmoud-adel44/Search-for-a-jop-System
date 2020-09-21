@extends('layout')


@section('title')
student
@endsection
@section('home')
<li class="nav-item">
<a class="nav-link" href="{{route('students.index')}}">Home</a>
</li>
@endsection
@section('nav')
<li class="nav-item">
  <a class="nav-link " href="{{route('resumes.create')}}">add resume</a>
</li>

<li class="nav-item">
  <a class="nav-link " href="{{route('students.edit' , $user->id)}}">edit profile</a>
</li>

<li class="nav-item">
  <a class="nav-link " href="{{route('students.resumes')}}">view resumes</a>
</li>
@endsection

@section('content')

<h1>{{Auth::user()->email}}</h1>
<h1>{{$user->location}}</h1>
<h1>{{$user->city}}</h1>








@endsection