<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
  
    public function index()
    {

        $posts = Post::paginate(5);

        return view('dashboard.post.index', compact('posts'));
    }

   
    public function create()
    {
        $categories = Category::get();


        return view('dashboard.post.create', compact('categories'));
    }

    
    public function store(StoreRequest $request)
    {


        Post::create($request->validated());

        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('dashboard.post.edit', compact('categories', 'post'));
    }

  
    public function update(UpdateRequest $request, Post $post)
    {
        $post->update($request->validated());

        return to_route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('post.index');
    }
}
