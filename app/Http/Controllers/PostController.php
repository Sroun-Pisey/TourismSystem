<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['customer', 'category'])->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $customers = Customer::all();
        $categories = Category::all();
        return view('posts.create', compact('customers', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'feather_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        $post = new Post();
        $post->customer_id = $request->customer_id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->has('status') ? 1 : 0;


        // Handle feather_image upload
        if ($request->hasFile('feather_image')) {
            // Delete old image if it exists
           if ($post->feather_image && Storage::disk('public')->exists($post->feather_image)) {
                Storage::disk('public')->delete($post->feather_image);
            }


            // Store new image
            $featherPath = $request->file('feather_image')->store('posts/feathers', 'public');
            $post->feather_image = $featherPath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        // Eager load customer and category relationships
        $post->load(['customer', 'category']);

        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $customers = Customer::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'customers', 'categories'));
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'feather_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post->customer_id = $request->customer_id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->has('status') ? 1 : 0;

        // Handle feather_image upload
        if ($request->hasFile('feather_image')) {
            // Delete old image if it exists
            if ($post->feather_image && Storage::disk('public')->exists($post->feather_image)) {
                Storage::disk('public')->delete($post->feather_image);
            }

            // Store new image
            $featherPath = $request->file('feather_image')->store('posts/feathers', 'public');
            $post->feather_image = $featherPath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }





    public function destroy(Post $post)
    {
        if ($post->feather_image) {
            Storage::disk('public')->delete($post->feather_image);
        }

        if ($post->images) {
            foreach ($post->images as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
