<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document crud</title>
    <style>
        #outer
{
   
    text-align: center;
}
.inner
{
    display: inline-block;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel='stylesheet'
   href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>


</head>
<body>
    @extends('master.master')
    @section('navbar')
    <form action="{{route('crud.index')}}" method="get">
       
        <input type="search" name="search"  @foreach($cruds as $crud)  value= "{{$crud->search}}"   @endforeach>
        
        <button type="submit">Search</button>
        <a href="{{route('crud.index')}}">
            <button>Reset</button>
        </a>

    </form>
    @if(Session::has('update'))
    {{session::get('update')}}
    @endif
    @if(Session::has('delete'))
    {{session::get('delete')}}
    @endif
    <table border=1px >
        <tr>
            <th>#</th> 
            <th>Active</th> 
            <th>Date</th> 
            <th>Roll</th>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Password</th>
           <th>Action</th>
           <th>Post</th>
           
        </tr>
        @foreach($cruds as $crud)
        <tr>
         <td>{{$crud->id}}</td>
         <td>{{$crud->is_publish == '1' ? 'Yes' : 'No' }}</td>
         <td>{{$crud->created_at}}</td>
         <td>{{$crud->rolls->roll}}</td>
         <td>{{Str::limit($crud->name, '20')}}</td>
         <td>{{$crud->number}}</td>
         <td>{{$crud->email}}</td>
         <td>{{$crud->password}}</td>
         <td id="outer">
         
            @if($crud->trashed() == null)
             <button class="btn btn-warning inner"><a onclick="showlick();" href="{{route('crud.show',$crud->id)}}">Show<i class="fa fa-eye"></i></a></button>
            <button class="btn btn-info inner"><a  onclick="editclick();"href="{{route('crud.edit',$crud->id)}}">Edit<i class="fa fa-edit"></i></a></button>
            
            <form class="inner" action="{{route('crud.destroy', $crud->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-warning " type="submit" onclick="deleteclick();"><i class="fa fa-trash"></i>Delete</button>
          </form>
         
         
           @elseif($crud->trashed())
            <button ><a onclick="undo();" href="{{url('softdelete', $crud->id)}}"><i class="fa fa-undo"></i></a></button>
            @endif
        </td>
        <td>
            <form action="{{url('store_post', $crud->id)}}" class="form-group" method="post">
                @csrf
                <input type="text" name="post" id="post">
                <input type="hidden" name="crud_id" id="crud_id">

                <button type="submit" class="btn btn-primary">Post</button>

            </form>
        </td>
         
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {!! $cruds->links() !!}
    </div>
    @endsection
    <script>
        function deleteclick(){
            promnt("Are you Delete this Record");
        }
    </script>
    <script>
        function editclick(){
            confirm("Are you Edit this Record");
            
        }
    </script>
    <script>
        function showlick(){
            confirm("Are you Show this Record");
        }
    </script>
    <script>
        function undo(){
            confirm("Are you sure recover  this Record");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>