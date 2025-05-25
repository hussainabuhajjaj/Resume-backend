<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoDetailResource extends JsonResource
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
            'post_id' => $this->post_id,
            'post' => $this->whenLoaded('post', fn () => new PostResource($this->post)),
            'title' => $this->title,
            'keywords' => $this->keywords,
            'description' => $this->description,
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
            'links' => [
                'self' => route('api.seo-details.show', $this->id),
            ],
        ];
    }
}
