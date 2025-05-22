<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatronTier;
use App\Http\Resources\PatronTierResource;
class PatronTierController extends Controller
{
  public function index()
    {
        return PatronTierResource::collection(
            PatronTier::where('active', true)->orderBy('order')->get()
        );
    }


}
