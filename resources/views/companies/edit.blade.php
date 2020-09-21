

@extends('layout')

@section('content')


@if ($errors->any())
  @foreach ($errors->all() as $error)
  <p class="alert alert-danger">{{$error}}</p>
  @endforeach
@endif

<form method="POST" action="{{route('companies.update' , $company->id)}}" >

  @csrf
  <div class="form-group">
  
    <input type="text" name="name" class="form-control"  placeholder="name" value="{{old('name') ?? $company->name}}">
  </div>



  <div class="form-group">
  
    <input type="text" name="location" class="form-control"  placeholder="location" value="{{old('location') ?? $company->location}}">
  </div>


  <div class="form-group">
  
    <input type="text" name="city" class="form-control"  placeholder="city" value="{{old('city') ?? $company->city}}">
  </div>






  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
