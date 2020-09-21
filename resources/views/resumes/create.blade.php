@extends('layout')


@section('home')
<li class="nav-item">
<a class="nav-link" href="{{route('students.index')}}">Home</a>
</li>
@endsection
@section('content')


@if ($errors->any())
  @foreach ($errors->all() as $error)
  <p class="alert alert-danger">{{$error}}</p>
  @endforeach
@endif

<form method="POST" action="{{route('resumes.store')}}" enctype="multipart/form-data">

  @csrf
  



  <div class="form-group">
  
    <input type="text" name="file_name" class="form-control"  placeholder="file_name" value="{{old('file_name')}}">
  </div>

  <div class="form-group">
    <input type="file" class="form-control-file" name="file_resume">
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="is_dafault"  value="1" checked>
    <label class="form-check-label" >
      is_default
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="is_dafault"  value="0">
    <label class="form-check-label" >
      not_default
    </label>
  </div>


  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
