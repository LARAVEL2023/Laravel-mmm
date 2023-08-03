<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/6d414475e8.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{route('crud.index')}}"> Home</a></li>
             <li><a href="{{route('crud.create')}}">Create</a></li>
            <li><a href="{{url('search')}}">Advance Search</a></li>
           
       </ul>
    </nav>
    @yield('content')
    @yield('navbar')
    @yield('search')

</body>
</html>