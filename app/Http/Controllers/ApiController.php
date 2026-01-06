<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Customer;
class ApiController extends Controller
{
    public function getAllPosts(){
        $posts = Post::with(['customer', 'category'])->latest()->get();
        //return $posts->toJson();
        return response()->json($posts);
    }

    public function getShowById($id)
    {
        $post = Post::with(['customer', 'category'])->find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

}
