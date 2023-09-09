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
        @foreach($comments as $comment)
        <tr>
         <td>{{$comment->id}}</td>
         <td>{{$comment->crud->name}}</td>
         <td>{{$comment->post->post}}</td>
        <td>{{$comment->message}}</td>
       
        
        
         <td>
           
            
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