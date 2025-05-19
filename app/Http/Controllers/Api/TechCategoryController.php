<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechCategoryResource;
use App\Models\TechCategory;

class TechCategoryController extends Controller
{
    public function index()
    {
        // Eager load techItems and order them within the relationship query
        $categories = TechCategory::with(['techItems' => function ($query) {
            $query->orderBy('order');
        }])->orderBy('order')->get();

        return TechCategoryResource::collection($categories);
    }
}