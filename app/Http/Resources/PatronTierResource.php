<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatronTierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
     return [
            'id'       => $this->id,
            'name'     => $this->name,
            'price'    => $this->price,
            'currency' => $this->currency,
            'benefits' => $this->benefits,
            'order'    => $this->order,
        ];
        }
}
