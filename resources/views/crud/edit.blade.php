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
    @section('content')
    <h1>Edit User</h1>
    <form action="{{route('crud.update', $crud->id)}}" method="post">
        @csrf
        @method('PUT')
        Name: <input type="text" value="{{old('name', $crud->name)}}" name="name" ><br><br>
        Number: <input type="text" value="{{old('number',$crud->number)}}" name="number" ><br><br>
        Email: <input type="text" value="{{old('email',$crud->email)}}" name="email" ><br><br>
        Password: <input type="text"value="{{old('password',$crud->password)}}" name="password" ><br><br>
        @php
        $rolls =  \Illuminate\Support\Facades\
                   DB::select("SELECT *  FROM `rolls`");
         @endphp
     Roll:
    <select name="roll_id" >
        <option value="" disabled selected>Select Roll </option>
        @foreach($rolls as $roll)
            <option @selected(old('roll_id')) value="{{$roll->id}}">
                {{$roll->roll}}</option>
        @endforeach
    </select>
             {{-- <option @if(old('roll_id') ==1) selected @endif  value="1">Manager</option>
            <option @if(old('roll_id') == 2) selected @endif value="2">Senior</option>  --}}
           {{-- <option @selected(old('roll_id') == 1)  value="1">Manager</option>
            <option @selected(old('roll_id') == 2) value="2">Senior</option> --}}
        </select>
        
        <br><br>
        <button type="submit">Update</button>
    </form>
    @endsection
    
</body>
</html>


    