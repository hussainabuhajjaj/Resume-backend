<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with(['technologies' => function($query) {
            // Optionally order technologies if needed, though often not critical here
            // $query->orderBy('name');
        }])->orderBy('order');

        if ($request->has('featured') && $request->boolean('featured')) {
            $query->where('is_featured', true);
        }

        return ProjectResource::collection($query->get());
    }
}