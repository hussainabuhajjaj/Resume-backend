<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'description' => $this->description,
            'organization_name' => $this->organization_name,
            'logo' => $this->logo,
            'logo_url' => $this->logo_image_attribute,
            'favicon' => $this->favicon,
            'favicon_url' => $this->fav_icon_image_attribute,
            'google_console_code' => $this->google_console_code,
            'google_analytic_code' => $this->google_analytic_code,
            'google_adsense_code' => $this->google_adsense_code,
            'quick_links' => $this->quick_links,
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}