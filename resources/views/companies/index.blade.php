@extends('layout')

@section('title')
company
@endsection

@section('home')
<li class="nav-item">
<a class="nav-link" href="{{route('companies.index')}}">Home</a>
</li>
@endsection
@section('nav')
<li class="nav-item">
  <a class="nav-link " href="{{route('jops.create')}}">add jope</a>
</li>

<li class="nav-item">
  <a class="nav-link " href="{{route('companies.edit' , $company->id)}}">edit profile</a>
</li>

<li class="nav-item">
  <a class="nav-link " href="{{route('companies.jops')}}">view your added</a>
</li>
@endsection
@section('content')

<h1>{{Auth::user()->email}}</h1>
<h1>{{$company->location}}</h1>
<h1>{{$company->city}}</h1>
<h1>{{$company->name}}</h1>





@endsection