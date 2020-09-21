<table class="table">
    <thead>
      <tr>
      
        <th scope="col">jops title</th>
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
        @else
        <td>Invalid</td>
        @endif
        
        <td>{{$item->created_at}}</td>
        <td><a class="btn btn-danger" href="{{route('jops.delete' , $item->id)}}">delete</a></td>
      
      </tr>
  
    
    </tbody>
    @endforeach
  </table>