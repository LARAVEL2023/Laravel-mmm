<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <form action="{{url('post')}}" method="get">
       
        <input type="search" name="search" >
        
        <button type="submit">Search</button>
        <a href="{{url('create')}}">
            <button>Reset</button>
        </a>

    </form>
    @if(Session::has('update'))
    {{session::get('update')}}
    @endif
    @if(Session::has('delete'))
    {{session::get('delete')}}
    @endif
    <table border=1px>
        <tr>
            <th>Id</th> 
           <th>User</th>
            <th>Post</th>
            <th>Comment</th>

            
           
        </tr>
        @foreach($posts as $post)
        <tr>
         <td>{{$post->id}}</td>
         <td>{{$post->cruds->name}}</td>
 
         <td>{{$post->post}}</td>
         <td>
            {{-- Foreign key stored by passing id in url and session  --}}
             <form action="{{url('send_message',$post->id)}}" class="form-group" method="post">
                @csrf
                <input type="text" name="message" id="message">
                <input type="hidden" name="post_id" >
                

                <button type="submit" class="btn btn-primary">Comment</button>

            </form> 
            



             {{-- Foreign key stored by dynamic data using  --}}
        {{-- <form action="{{ url('store_comment') }}" class="form-group" method="POST">
                @csrf
                <div >
                    <label for="text">	message</label>
                    <input type="text" name="message" id="	message"  rows="4">
                </div>
                <div >
                    <label for="crud_id">User</label>
                    <select name="crud_id" id="crud_id" >
                        @foreach($cruds as $crud)
                            <option value="{{ $crud->id }}">{{ $crud->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div >
                    <label for="post_id">Post</label>
                    <select name="post_id" id="post_id" >
                        @foreach($posts as $post)
                            <option value="{{ $post->id }}">{{ $post->post }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form> --}}

         </td>
        
         </tr>
        @endforeach
    </table>
    
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