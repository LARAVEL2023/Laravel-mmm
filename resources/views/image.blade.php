<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Upload image</h1>
    <form action="{{url('store_image')}}" method="post" enctype="multipart/form-data">
        @csrf
        Image: <input type="file" name="image" ><br><br>
        <button type="submit">Upload</button>
    </form>
    
</body>
</html>