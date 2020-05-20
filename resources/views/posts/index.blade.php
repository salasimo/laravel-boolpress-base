<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boolpress</title>
</head>
<body>
    <h1>Articoli già pubblicati</h1>
    <ul>
    @foreach ($posts as $post)
        <li>
            <h2>{{$post->title}}</h2>
            <p>Pubblicato da: {{$post->author}} | {{$post->published_at}}</p>
            <div><img src="{{$post->img_path}}" alt=""></div>
            <p>{{$post->body}}</p>
        </li>
    @endforeach
    </ul>
</body>
</html>

