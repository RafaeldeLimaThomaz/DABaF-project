<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    public function getPostForm() {
        return view('postForm');
    }

    public function store(CreatePostRequest $request) {

        $data = $request->validated();
        Post::create($data);
        return response()->json(['message' => 'Profile creation was successful'], 200);
    }
}
