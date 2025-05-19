<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NavigationLinkResource;
use App\Models\NavigationLink;

class NavigationLinkController extends Controller
{
    public function index()
    {
        return NavigationLinkResource::collection(
            NavigationLink::where('is_active', true)->orderBy('order')->get()
        );
    }
}