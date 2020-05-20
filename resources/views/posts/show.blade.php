<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boolpress</title>
</head>
<body>
    <h1>{{$post->title}}</h1>
    <p>Pubblicato da: {{$post->author}} | {{$post->published_at}}</p>
    <div><img src="{{$post->img_path}}" alt=""></div>
    <p>{{$post->body}}</p>  
</body>
</html>


   
