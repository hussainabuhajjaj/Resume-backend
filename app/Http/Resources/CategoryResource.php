<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostResource;
use Firefly\FilamentBlog\Models\Post;
use Firefly\FilamentBlog\Models\Category;   
use Firefly\FilamentBlog\Models\Comment;
use Firefly\FilamentBlog\Models\Newsletter;
use Firefly\FilamentBlog\Models\Tag;
use Firefly\FilamentBlog\Models\User;
use Firefly\FilamentBlog\Models\Role;
use Firefly\FilamentBlog\Models\Permission;
use Firefly\FilamentBlog\Models\Setting;
use Firefly\FilamentBlog\Models\SeoDetail;
use Firefly\FilamentBlog\Models\Status;
use Firefly\FilamentBlog\Models\NewsletterSubscriber;
class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'posts_count' => $this->whenCounted('posts'),
            'posts' => $this->whenLoaded('posts', fn () => PostResource::collection($this->posts)),
            'links' => [
                'self' => route('api.categories.show', $this->id),
            ],
        ];
        }
}
