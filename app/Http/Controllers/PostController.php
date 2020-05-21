<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where("published", 1)->get();

        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => "unique:posts|max:150",
            'slug' => "unique:posts|max:255",
            'author' => "max:255",
            'img_path' => "max:255"
        ]);

        $data = $request->all();
        $post = new Post;
        $post->fill($data);
        $saved = $post->save();
        if (!$saved) {
            dd("Errore salvataggio");
        }

        return redirect()->route("posts.show", $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            abort("404");
        }
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (empty($post)) {
            abort('404');
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (empty($post)) {
            abort('404');
        }

        $data = $request->all();
        // $now = Carbon::now()->format('Y-m-d-H-i-s');
        // $data['slug'] = Str::slug($data['title'], '-') . $now;

        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'body' => 'required',
            'author' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('articles.edit')
                ->withErrors($validator)
                ->withInput();
        }

        // if (empty($data['img'])) {
        //     unset($data['img']);
        //     // $data['img'] = 'mio path';
        // }

        //ATTENZIONE QUESTO SOTTO ROMPE L'UPDATE
        //================================

        // $request->validate([
        //     'title' => "unique:posts|max:150",
        //     'slug' => "unique:posts|max:255",
        //     'author' => "max:255",
        //     'img_path' => "max:255"
        // ]);

        //=========================================


        $post->fill($data);
        $updated = $post->update();
        if (!$updated) {
            dd("Errore nell'update");
        }

        return redirect()->route("posts.show", $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
