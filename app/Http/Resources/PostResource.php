<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\SeoDetailResource;
use Firefly\FilamentBlog\Models\Post;
use Firefly\FilamentBlog\Models\Category;
use Firefly\FilamentBlog\Models\Comment;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'sub_title' => $this->sub_title,
            'body' => $this->body,
            'status' => $this->status?->name ?? null,
            'published_at' => $this->formattedPublishedDate(),
            'scheduled_for' => $this->scheduled_for?->toISOString(),
            'cover_photo_url' => $this->feature_photo ?? null,
            'photo_alt_text' => $this->photo_alt_text,
            'user' => $this->whenLoaded('user', fn() => new UserResource($this->user)),
            'categories' => $this->whenLoaded('categories', fn() => CategoryResource::collection($this->categories)),
            'tags' => $this->whenLoaded('tags', fn() => TagResource::collection($this->tags)),
            'comments_count' => $this->whenCounted('comments'),
            'comments' => $this->whenLoaded('comments', fn() => CommentResource::collection($this->comments)),
            'seo_detail' => $this->whenLoaded('seoDetail', fn() => new SeoDetailResource($this->seoDetail)),
            'related_posts' => $this->when(isset($this->related_posts), fn() => PostResource::collection($this->related_posts)),
            'links' => [
                'self' => route('api.posts.show', $this->id),
            ],
        ];
    }
}
