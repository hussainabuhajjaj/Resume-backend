<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        // Eager load descriptionPoints and order them within the relationship query
        $experiences = Experience::with(['descriptionPoints' => function ($query) {
            $query->orderBy('order');
        }])->orderBy('order')->orderBy('start_date', 'desc')->get();

        return ExperienceResource::collection($experiences);
    }
}