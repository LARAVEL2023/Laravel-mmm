<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('master.master')
    @section('navbar')
    <table border=1px>
        <tr>
            <th>#</th>
            <th>Roll</th>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
       
        <tr>
         <td>{{$crud->id}}</td>
         @foreach($crud->images as $image)
         <td><img src="{{asset('uploads/images/'.$image->image)}}" width="100px" height="180px"></td>
         @endforeach
         <td>{{$crud->rolls->roll}}</td>
        <td>{{$crud->name}}</td>
         <td>{{$crud->number}}</td>
         <td>{{$crud->email}}</td>
         <td>{{$crud->password}}</td>
        <td>
            <button><a href="{{route('crud.edit',$crud->id)}}">Edit</a></button>
            <form action="{{route('crud.destroy', $crud->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="deleteclick();">Delete</button>
            
        </td>
        
         
        </tr>
        
    </table>
    @endsection
    
</body>
</html>