<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechItemResource;
use App\Models\TechItem;

class TechItemController extends Controller
{
    public function index()
    {
        return TechItemResource::collection(
            TechItem::with('techCategory')->orderBy('tech_category_id')->orderBy('order')->get()
        );
    }
}