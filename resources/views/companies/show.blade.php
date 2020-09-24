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

{{-- <li class="nav-item">
  <a class="nav-link " href="{{route('companies.edit' , $company->id)}}">edit profile</a>
</li> --}}

<li class="nav-item">
  <a class="nav-link " href="{{route('companies.jops')}}">view your added</a>
</li>
@endsection
@section('content')

<table class="table">
  <thead>
    <tr>
    
      <th scope="col">jop_id</th>
      <th scope="col">student_id</th>
      <th scope="col">resume_id</th>
      <th scope="col">status</th>
      <th scope="col">block</th>
      <th scope="col">Delete</th>
      <th scope="col">Approved</th>
    </tr>
  </thead>
  @foreach ($data as $item)


  <tbody>
    <tr>
      
      <td>{{$item->jop_id}}</td>
      <td>{{$item->student_id}}</td>
      <td>{{$item->resume_id}}</td>
      @if ($item->status == 0)
      <td>Unapproved</td>
      @else
      <td>approved</td>
      @endif
      
      <td>{{$item->block}}</td>
      <td><a class="btn btn-danger" href="{{route('companies.destroy' , $item->id)}}">Delete</a></td>
      <td><a class="btn btn-info" href="{{route('companies.approve' , $item->id)}}">Approved</a></td>
    
    </tr>


  </tbody>
  @endforeach
</table>





@endsection