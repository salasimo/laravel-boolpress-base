<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boolpress | Edit</title>
</head>
<body>
<h1>Modifica articolo</h1>
<form action="{{route('posts.update', $post->id)}}" method="POST">
    @csrf
    @method("PUT")
    <input type="text" name="title" placeholder="Titolo" value="{{ (!empty(old('title')) ) ? old('title') : $post->title }}">
    <input type="text" name="author" placeholder="Autore" value="{{$post->author}}">
    <input type="text" name="slug" placeholder="slug" value="{{$post->slug}}">
    <input type="text" name="img_path" placeholder="Link Immagine" value="{{$post->img_path}}">
    <br>
    <textarea name="body">{{ (!empty(old('body')) ) ? old('body') : $post->body }}</textarea>
    <br>
    <input type="radio" name="published" id="1" value="1">
    <label for="1">Pubblicato</label>
    <input type="radio" name="published" id="0" value="0" checked>
    <label for="0">Bozza</label>
    <br>
    <input type="submit" value="Aggiorna articolo">
</form>
</body>
</html>
