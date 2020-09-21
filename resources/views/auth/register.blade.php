@extends('layout')

@section('title')
Registertion
@endsection

@section('content')

@include('errors')

<h2 >Sign Up</h2>
<br>

<form method="POST" action="{{ route('auth.handleRegister') }}" >

  @csrf

  <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="name" value="{{ old('name') }}">
  </div> 

  <div class="form-group">
    <input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email') }}">
  </div>


  <div class="form-group">
    <input type="password" name="password" class="form-control" placeholder="password" value="{{ old('password') }}">
  </div>


  
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status"  value="student" checked>
    <label class="form-check-label" >
      Student
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status"  value="company">
    <label class="form-check-label" >
      Company
    </label>
  </div>

<br>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<br>

@endsection