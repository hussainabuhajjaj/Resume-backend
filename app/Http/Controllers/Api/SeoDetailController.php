<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SeoDetailResource;
use Firefly\FilamentBlog\Models\Post;
use Firefly\FilamentBlog\Models\SeoDetail;
use Illuminate\Http\Request;

class SeoDetailController extends Controller
{
  public function index()
{
    $seoDetails = SeoDetail::with('post')->paginate();

    return SeoDetailResource::collection($seoDetails);
}

public function show(SeoDetail $seoDetail)
{
    $seoDetail->load('post');

    return new SeoDetailResource($seoDetail);
}

public function byPost(Post $post)
{
    $seoDetail = $post->seoDetail;

    if (!$seoDetail) {
        return response()->json(['message' => 'SEO details not found'], 404);
    }

    return new SeoDetailResource($seoDetail);
}
}
