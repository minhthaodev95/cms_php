<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {   

        $posts = Posts::orderBy('created_at', 'desc')->paginate(10)->withQueryString()
        ->through(fn ($post) => [
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body,
            'feature_image_id' => $post->feature_image_id,
            'status' => $post->status,
            'created_at' => $post->created_at,
        ]);

        // dd($posts);

        return Inertia::render('Posts/Index', [
            'filters' => Request::all('search', 'trashed'),
            'posts' => $posts
        ]);
    }

    public function show($id)
    {
        
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect('/posts');
    }

    public function edit($id)
    {
     
    }

    public function update($id)
    {
        
    }

}
