<table class="table">
    <thead>
      <tr>
      
        <th scope="col">Cv_name</th>
        <th scope="col">is_default</th>
        <th scope="col">created_at</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    @foreach ($resumes as $item)
  
  
    <tbody>
      <tr>
        
        <td>{{$item->file_name}}</td>
        <td>{{$item->is_default}}</td>
        <td>{{$item->created_at}}</td>
        <td><a class="btn btn-danger" href="{{route('resumes.delete' , $item->id)}}">delete</a></td>
      
      </tr>
  
   
    </tbody>
    @endforeach
  </table>