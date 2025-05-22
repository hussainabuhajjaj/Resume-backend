<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Firefly\FilamentBlog\Models\Setting;
use App\Http\Resources\SettingResource;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogSetting = Setting::all();
        
        return SettingResource::collection($blogSetting);
    }

    /**
     * Store a newly created resource in storage.
     */
    
}
