<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('posts.category', compact('categories'));
    }



    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }



    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
