<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LocationArticle;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationArticleController extends Controller
{
    public function index()
    {
        $articles = LocationArticle::with('location')->latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('admin.articles.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'section1_title' => 'required|string|max:255',
            'section1_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'section1_desc' => 'required|string',
            'section2_subtitle' => 'required|string|max:255',
            'section2_paragraphs' => 'required|array|min:1',
            'section2_paragraphs.*' => 'required|string',
            'section3_punchline' => 'required|string',
            'section4_points' => 'required|array|min:1',
            'section4_points.*.title' => 'required|string',
            'section4_points.*.explanation' => 'required|string',
        ]);

        // Handle image upload
        if ($request->hasFile('section1_image')) {
            $image = $request->file('section1_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/articles'), $filename);
            $validated['section1_image'] = 'images/articles/' . $filename;
        }

        LocationArticle::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article created successfully');
    }

    public function edit(LocationArticle $article)
    {
        $locations = Location::all();
        return view('admin.articles.edit', compact('article', 'locations'));
    }

    public function update(Request $request, LocationArticle $article)
    {
        $validated = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'section1_title' => 'required|string|max:255',
            'section1_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'section1_desc' => 'required|string',
            'section2_subtitle' => 'required|string|max:255',
            'section2_paragraphs' => 'required|array|min:1',
            'section2_paragraphs.*' => 'required|string',
            'section3_punchline' => 'required|string',
            'section4_points' => 'required|array|min:1',
            'section4_points.*.title' => 'required|string',
            'section4_points.*.explanation' => 'required|string',
        ]);

        // Handle image upload
        if ($request->hasFile('section1_image')) {
            // Delete old image
            if ($article->section1_image && file_exists(public_path($article->section1_image))) {
                unlink(public_path($article->section1_image));
            }
            
            $image = $request->file('section1_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/articles'), $filename);
            $validated['section1_image'] = 'images/articles/' . $filename;
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article updated successfully');
    }

    public function destroy(LocationArticle $article)
    {
        // Delete image
        if ($article->section1_image && file_exists(public_path($article->section1_image))) {
            unlink(public_path($article->section1_image));
        }
        
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article deleted successfully');
    }
}
