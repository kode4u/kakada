<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($request->all());

        return response()->json($category, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|file|mimes:jpg,jpeg,png,pdf|max:2048', // Adjust validation rules as needed
        ]);

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], Response::HTTP_NOT_FOUND);
        }

        // Handle file upload
        if ($request->hasFile('name')) {
            // Delete the old file if exists
            if ($category->name) {
                Storage::delete($category->name);
            }
            $filePath = $request->file('name')->store('categories');
            $category->name = $filePath;
        }

        $category->save();

        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], Response::HTTP_NOT_FOUND);
        }

        // Delete the file if exists
        if ($category->name) {
            Storage::delete($category->name);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
