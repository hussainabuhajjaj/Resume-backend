<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SocialLinkResource;
use App\Models\SocialLink;

class SocialLinkController extends Controller
{
   
    public function index()
    {
        return SocialLinkResource::collection(SocialLink::orderBy('order')->get());
    }
}