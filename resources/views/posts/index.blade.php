@extends('layouts/app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-12">  
        <table class="table">
          <thead>
            <th>Titolo</th>
            <th>Autore</th>
            <th colspan="3">Azioni</th>
          </thead>
          <tbody>
            @foreach ($posts as $post)
                <tr>
                  <td>{{$post->title}}</td>
                  <td>{{$post->author}}</td>
                  <td><a class="btn btn-primary" href="{{route('posts.edit', $post->id)}}">Modifica</a></td>
                  <td><a class="btn btn-primary" href="{{route('posts.show', $post->slug)}}">Visualizza</a></td>
                <td><form action="{{route('posts.destroy', $post->id)}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" type="submit">Elimina</button>
                </form></td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>  
@endsection


