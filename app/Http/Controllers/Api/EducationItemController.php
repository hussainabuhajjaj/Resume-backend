<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationItemResource;
use App\Models\EducationItem;

class EducationItemController extends Controller
{
    public function index()
    {
        return EducationItemResource::collection(
            EducationItem::orderBy('order')->orderBy('start_date', 'desc')->get()
        );
    }
}