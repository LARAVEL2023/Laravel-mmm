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
   
          @php
          use App\Post;
          use App\Comment;
          $postCount = Post::count();
          $commentCount = Comment::count();
         
          
        //  dd($postCount);
          @endphp
    <nav>
        <ul>
             
            <li><a href="{{route('crud.index')}}"> Home</a></li>
             <li><a href="{{route('crud.create')}}">Create</a></li>
            <li><a href="{{url('search')}}">Advance Search</a></li>
         
           @if($postCount > 0)
            <li><a href="{{url('post')}}">Post-{{$postCount}}</a></li>
           @elseif($commentCount > 0) 
           <li><a href="{{url('comment')}}">Comment({{$commentCount}})</a></li>
            @else 
            @endif
           
       </ul>
    </nav>
    @yield('content')
    @yield('navbar')
    @yield('search')

</body>
</html>