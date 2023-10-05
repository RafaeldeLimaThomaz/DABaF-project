<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    public function getPostForm() {
        return view('postForm');
    }

    /**
     * Redirects the user to the "posts" route.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request) {

        $data = $request->validated();
        Post::create($data);
        return redirect()->route('posts.all');
    }

    public function all() {
        $posts = Post::all(); 
        return view('allPosts', compact('posts')); 
    }
}
