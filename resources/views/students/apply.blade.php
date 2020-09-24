@extends('layout')

@section('title')
apply
@endsection


@section('home')
<li class="nav-item">
<a class="nav-link" href="{{route('students.index')}}">Home</a>
</li>
@endsection

@section('content')
  
<form method="POST" action="{{route('students.sent' ,$jop->id)}}">

  @csrf
  <input type="text" hidden value="{{$jop->id}}" name="jop_id">
  

@foreach($resumes as $resume)
<div class="form-check">
  <input class="form-check-input" type="radio" name="resume_id"  value="{{$resume->id}}" checked>
  <label class="form-check-label" >
    {{$resume->file_name}}
  </label>
</div>
@endforeach


<hr>
  <a class="btn btn-secondary " href="{{route('resumes.create')}}">add resume</a>






  <button type="submit" name="submit" class="btn btn-primary">Sent</button>
</form>


@endsection
