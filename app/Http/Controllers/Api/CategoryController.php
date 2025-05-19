<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Firefly\FilamentBlog\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $categories = Category::withCount('posts')->paginate();

    return CategoryResource::collection($categories);
}

public function show(Category $category)
{
    $category->loadCount('posts');
    $category->load('posts');

    return new CategoryResource($category);
}
}
