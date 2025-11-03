<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'price' => 'required|numeric|min:0',
            'total_shares' => 'required|integer|min:1',
            'price_per_share' => 'required|numeric|min:0',
            'property_type' => 'required|string',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'land_area' => 'required|numeric|min:0',
            'building_area' => 'required|numeric|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'amenities' => 'nullable|string',
            'status' => 'required|in:available,sold_out,coming_soon',
            'expected_rental_yield' => 'nullable|numeric|min:0|max:100',
            'is_featured' => 'boolean'
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);
        $validated['available_shares'] = $validated['total_shares'];

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('images/properties'), $mainImageName);
            $validated['main_image'] = 'images/properties/' . $mainImageName;
        }

        // Handle multiple images upload
        $imagesPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $imageName);
                $imagesPaths[] = 'images/properties/' . $imageName;
            }
        }
        $validated['images'] = $imagesPaths;

        // Convert amenities string to array
        if (isset($validated['amenities'])) {
            $validated['amenities'] = array_map('trim', explode(',', $validated['amenities']));
        }

        Property::create($validated);

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::findOrFail($id);
        return view('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::findOrFail($id);
        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property = Property::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'price' => 'required|numeric|min:0',
            'total_shares' => 'required|integer|min:1',
            'available_shares' => 'required|integer|min:0',
            'price_per_share' => 'required|numeric|min:0',
            'property_type' => 'required|string',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'land_area' => 'required|numeric|min:0',
            'building_area' => 'required|numeric|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'amenities' => 'nullable|string',
            'status' => 'required|in:available,sold_out,coming_soon',
            'expected_rental_yield' => 'nullable|numeric|min:0|max:100',
            'is_featured' => 'boolean'
        ]);

        // Update slug if title changed
        if ($validated['title'] !== $property->title) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            // Delete old main image
            if ($property->main_image && file_exists(public_path($property->main_image))) {
                unlink(public_path($property->main_image));
            }
            
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('images/properties'), $mainImageName);
            $validated['main_image'] = 'images/properties/' . $mainImageName;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            $imagesPaths = $property->images ?? [];
            
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $imageName);
                $imagesPaths[] = 'images/properties/' . $imageName;
            }
            $validated['images'] = $imagesPaths;
        }

        // Convert amenities string to array
        if (isset($validated['amenities'])) {
            $validated['amenities'] = array_map('trim', explode(',', $validated['amenities']));
        }

        $property->update($validated);

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);

        // Delete main image
        if ($property->main_image && file_exists(public_path($property->main_image))) {
            unlink(public_path($property->main_image));
        }

        // Delete all images
        if ($property->images) {
            foreach ($property->images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully!');
    }
}

