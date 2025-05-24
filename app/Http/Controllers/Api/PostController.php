<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Firefly\FilamentBlog\Models\Category;
use Firefly\FilamentBlog\Models\Post;
use Firefly\FilamentBlog\Models\Tag;
use App\Http\Resources\PostResource;
use Firefly\FilamentBlog\Models\Comment;
use Firefly\FilamentBlog\Models\Newsletter;
use Firefly\FilamentBlog\Models\User;
use Firefly\FilamentBlog\Models\Role;
use Firefly\FilamentBlog\Models\Permission;
use Firefly\FilamentBlog\Models\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function index(Request $request)
    {
        // 🔍 Initialize the query
    $query = Post::query();

        // 🔍 Search filter
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('body', 'like', "%$search%");
            });
        }

        // 📂 Status filter
        if ($request->filled('status')) {
            $status = $request->input('status');
            $query->where('status', $status);
        }

        // 🗃️ Category filter
        if ($request->filled('category')) {
            $categoryId = $request->input('category');
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('id', $categoryId);
            });
        }

        // 🏷️ Tag filter
        if ($request->filled('tag')) {
            $tagId = $request->input('tag');
            $query->whereHas('tags', function ($q) use ($tagId) {
                $q->where('id', $tagId);
            });
        }

        // ⏰ Date filters
        if ($request->filled('from') && $request->filled('to')) {
            $from = $request->input('from');
            $to = $request->input('to');
            $query->whereBetween('published_at', [$from, $to]);
        } elseif ($request->filled('from')) {
            $query->whereDate('published_at', '>=', $request->input('from'));
        } elseif ($request->filled('to')) {
            $query->whereDate('published_at', '<=', $request->input('to'));
        }

        // 🔁 Sorting
        $sort = $request->input('sort');
        if ($sort) {
            $direction = str_starts_with($sort, '-') ? 'desc' : 'asc';
            $sortColumn = ltrim($sort, '-');
            $query->orderBy($sortColumn, $direction);
        } else {
            $query->latest('published_at'); // Default sorting
        }

        // 🧩 Eager loading
        $posts = $query->with(['user', 'categories', 'tags'])->paginate(15)->appends($request->query());

        return PostResource::collection($posts);
    }

 public function show($id)
{
    try {
        $post = Post::with([
            'user',
            'categories',
            'tags',
            'comments',
            'seoDetail'
        ])->findOrFail($id);

        $post->setRelation('related_posts', $post->relatedPosts(3));

        return new PostResource($post);
    } catch (ModelNotFoundException $e) {
        return response()->json([
            'message' => 'Post not found.-'.$e->getMessage(),
        ], 404);
    }
}



public function showBySlug(string $slug)
{
    $post = Post::with([
        'user',
        'categories',
        'tags',
        'comments',
        'seoDetail'
    ])->where('slug', $slug)->first();

    if (!$post) {
        // Try fuzzy match by title
        $relatedPosts = Post::where('title', 'like', "%$slug%")
            ->orWhereHas('tags', function ($q) use ($slug) {
                $q->where('name', 'like', "%$slug%");
            })
            ->orWhereHas('categories', function ($q) use ($slug) {
                $q->where('name', 'like', "%$slug%");
            })
            ->take(5)
            ->get();

        return response()->json([
            'message' => "Post not found",
            'suggestions' => PostResource::collection($relatedPosts),
        ], 404);
    }

    $post->setRelation('related_posts', $post->relatedPosts(3));

    return new PostResource($post);
}
}
