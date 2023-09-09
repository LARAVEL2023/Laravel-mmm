<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
   
</head>
<body>
    
    <h1>Create User</h1>
    @if(Session::has('alert-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> {{session::get('alert-success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif


    <form action="{{url('storepost')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        
        <br><br>
        Post: <input type="text" class="form-group" name="name"{{old('number')}} ><br><br>
       
        
        <br><br>
       
        
        {{-- @php
        $rolls =  \Illuminate\Support\Facades\
                   DB::select("SELECT *  FROM `rolls`");
         @endphp
     Roll:
    <select name="roll_id" >
        <option value="">Select Roll </option>
        @foreach($rolls as $roll)
            <option @selected(old('roll_id') == {{$roll->id}}) value="{{$roll->id}}">
                {{$roll->roll}}</option>
        @endforeach
    </select> --}}
        {{-- <label >Roll</label>
        <select name="roll_id" class="form-group" >
            <option value="" disabled selected>Choose one</option>
            {{-- <option @if(old('name') ==1) selected @endif  value="1">vikas</option>
            <option @if(old('name') == 0) selected @endif value="0">vipin</option> --}}
            {{-- <option @selected(old('roll_id') == 1)  value="1">Manager</option>
            <option @selected(old('roll_id') == 2) value="2">Senior</option>
          
        </select><br><br> --}} <br>
        <button type="submit">Register</button>

    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>