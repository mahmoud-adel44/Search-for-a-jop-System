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

<form method="POST" action="{{route('jops.store')}}">

  @csrf
  



  <div class="form-group">
    <input type="text" name="jop_title" class="form-control"  placeholder="jop title" value="{{old('jop_title')}}">
  </div>

  <div class="form-group">
    <input type="text" name="location" class="form-control"  placeholder="location" value="{{old('location')}}">
  </div>



  <div class="form-check">
    <input class="form-check-input" type="radio" name="status"  value="1" checked>
    <label class="form-check-label" >
      valid
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status"  value="0">
    <label class="form-check-label" >
      invalid
    </label>
  </div>


  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
