<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boolpress</title>
</head>
<body>
<h1>Inserisci un nuovo articolo</h1>
<form action="{{route('posts.store')}}" method="POST">
    @method("POST")
    @csrf
    <input type="text" name="title" placeholder="Titolo">
    <input type="text" name="author" placeholder="Autore">
    <input type="text" name="slug" placeholder="slug">
    <input type="text" name="img_path" placeholder="Link Immagine">
    <br>
    <textarea name="body">Inserisci il testo</textarea>
    <br>
    <input type="radio" name="published" id="1" value="1">
    <label for="1">Pubblicato</label>
    <input type="radio" name="published" id="0" value="0" checked>
    <label for="0">Bozza</label>
    <br>
    <input type="submit" value="Salva articolo">
</form>
</body>
</html>

