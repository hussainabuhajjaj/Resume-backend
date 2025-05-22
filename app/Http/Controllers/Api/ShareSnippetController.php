<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Firefly\FilamentBlog\Models\ShareSnippet;
use App\Http\Resources\ShareSnippetResource;

class ShareSnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $snippets = ShareSnippet::all();
        return ShareSnippetResource::collection($snippets);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'script_code' => 'required|string',
            'html_code' => 'required|string',
            'active' => 'sometimes|boolean',
        ]);

        $snippet = ShareSnippet::create($validated);

        return new ShareSnippetResource($snippet);
    }

    public function show(string $id)
    {
        $snippet = ShareSnippet::findOrFail($id);
        return new ShareSnippetResource($snippet);
    }

    public function update(Request $request, string $id)
    {
        $snippet = ShareSnippet::findOrFail($id);

        $validated = $request->validate([
            'script_code' => 'sometimes|required|string',
            'html_code' => 'sometimes|required|string',
            'active' => 'sometimes|boolean',
        ]);

        $snippet->update($validated);

        return new ShareSnippetResource($snippet);
    }

    public function destroy(string $id)
    {
        $snippet = ShareSnippet::findOrFail($id);
        $snippet->delete();

        return response()->json(['message' => 'Snippet deleted successfully.']);
    }
}
