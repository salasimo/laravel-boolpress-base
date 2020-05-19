<h1>Tutti gli articoli</h1>
<ul>
    @foreach ($posts as $post)
        <li>
            <h2>{{$post->title}}</h2>
            <p>Pubblicato da: {{$post->author}} il {{$post->published_at}}</p>
            <div><img src="{{$post->img_path}}" alt="" width=400px></div>
            <p>{{$post->body}}</p>
        </li>
    @endforeach
</ul>