<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PersonalInfoResource;
use App\Models\PersonalInfo;

class PersonalInfoController extends Controller
{
    public function index()
    {
        $personalInfo = PersonalInfo::first();
        if (!$personalInfo) {
            // Return a default structure or 404 if you prefer strictness
            return response()->json(['data' => null, 'message' => 'Personal info not set up.'], 200); // Or 404
        }
        return new PersonalInfoResource($personalInfo);
    }
}