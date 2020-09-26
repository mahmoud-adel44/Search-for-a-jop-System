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
<form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword">
  
</form>
@endsection

@section('content')



<h1 class="d-flex justify-content-center">Avalliable Jops</h1>
<br>
<div id="allJops">
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
</div>
@endsection
@section('scripts')
<script>
  $('#keyword').keyup(function(){
    let keyword = $(this).val()
    let url = "{{route('students.search')}}" + "?keyword=" + keyword

     console.log(url);

    $.ajax({

      type:"GET", 
      url: url, 
      contentType:false,
      processData:false,
      success:function(data)
      {
        $('#allJops').empty()
        for(jop of data)
        {
          
          $('#allJops').append(`
          <table class="table">
          <thead>
            <tr>
            
              <th scope="col">jop title</th>
              <th scope="col">location</th>
              <th scope="col">status</th>
              <th scope="col">created_at</th>
             
            </tr>
          </thead>
          
        <tbody>
            <tr>
              
              <td>${jop.jop_title}</td>
              <td>${jop.location}</td>
              
            
              
              <td>valid</td>
              
              
              
              <td>${jop.created_at}</td>
              
            
            </tr>
        </tbody>
      </table>
        ` )

        }

        //console.log(data)
      }

    })
  })

</script>
    
@endsection
