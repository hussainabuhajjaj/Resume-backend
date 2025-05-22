<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Http\Resources\TestimonialResource;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        return TestimonialResource::collection(
            Testimonial::where('active', true)->latest()->get()
        );
    }
    public function show(Testimonial $testimonial)
    {
        return new TestimonialResource($testimonial);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'company' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'testimonial' => 'required|string|max:500',
            'active' => 'sometimes|boolean',
        ]);

        $testimonial = Testimonial::create($validated);

        return new TestimonialResource($testimonial);
    }
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:50',
            'company' => 'sometimes|required|string|max:50',
            'position' => 'sometimes|required|string|max:50',
            'testimonial' => 'sometimes|required|string|max:500',
            'active' => 'sometimes|boolean',
        ]);

        $testimonial->update($validated);

        return new TestimonialResource($testimonial);
    }
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return response()->json(['message' => 'Testimonial deleted successfully.']);
    }
}
