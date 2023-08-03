<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1px">
<tr>
    <th>#</th>
    <th>Image</th>
</tr>
@foreach($images as  $image)
<tr>
    <td>{{$image->id}}</td>
    <td><img src="{{asset('uploads/images/'.$image->image)}}" width="100x" height="100px" ></td>
</tr>
@endforeach
    </table>
    
</body>
</html>