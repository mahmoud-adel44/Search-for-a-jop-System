@extends('layout')


@section('title')
student
@endsection
@section('home')
<li class="nav-item">
<a class="nav-link" href="{{route('students.index')}}" style="color: turquoise">Home</a>
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



<h1 class="d-flex justify-content-center">Avalliable Jops</h1>
<br>
<table class="table">
  <thead>
    <tr>
    
      <th scope="col">jop title</th>
      <th scope="col">location</th>
      <th scope="col">status</th>
      <th scope="col">created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @foreach ($jops as $item)


  <tbody>
    <tr>
      
      <td>{{$item->jop_title}}</td>
      <td>{{$item->location}}</td>
    
      @if ($item->status == 1)
      <td>valid</td>
      @endif
      
      <td>{{$item->created_at}}</td>
      <td><a class="btn btn-info" href="{{route('students.apply' , $item->id)}}">Apply</a></td>
    
    </tr>

  
  </tbody>
  @endforeach
</table>
@endsection
