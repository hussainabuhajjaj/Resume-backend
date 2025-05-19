<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'company_name' => $this->company_name,
            'company_website' => $this->company_website,
            'location' => $this->location,
            'start_date' => $this->start_date->format('Y-m-d'),
            'end_date' => $this->end_date ? $this->end_date->format('Y-m-d') : null,
            'is_current' => $this->is_current,
            'short_description' => $this->short_description,
            'order' => $this->order,
            'description_points' => ExperienceDescriptionPointResource::collection($this->whenLoaded('descriptionPoints')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}