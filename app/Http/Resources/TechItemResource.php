<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TechItemResource extends JsonResource
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
            'icon_url_or_svg' => $this->icon_url_or_svg,
            'proficiency_level' => $this->proficiency_level,
            'order' => $this->order,
            'category' => new TechCategoryResource($this->whenLoaded('techCategory')),
        ];
    }
}
