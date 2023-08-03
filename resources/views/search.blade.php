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
    @section('search')
    <h1>Search Form</h1>
    <form action="{{route('crud.index')}}" method="get">
      
        <select name="search" id="">
            <option value="">Select Name</option>
            @foreach($cruds as $crud)
           <option value="{{$crud->name}}">{{$crud->name}}</option>
           @endforeach
        </select>
        <select name="search" id="">
            <option value="">Select Email</option>
            @foreach($cruds as $crud)
           <option value="{{$crud->email}}">{{$crud->email}}</option>
           @endforeach
        </select>
       
        
        <button type="submit">Search</button>
        <a href="{{route('crud.index')}}">
            <button>Reset</button>
        </a>

    </form>
    @endsection
{{-- Number:
<select name="" id="">
    <option value=""></option>
</select><br><br> --}}


    
</body>
</html>