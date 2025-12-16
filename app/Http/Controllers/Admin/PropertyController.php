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
        // Custom validation for images including AVIF
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'price' => 'required|numeric|min:0',
            'ownership' => 'nullable|string|max:100',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'land_area' => 'required|numeric|min:0',
            'building_area' => 'required|numeric|min:0',
            'built_in' => 'nullable|integer|min:1900|max:2100',
            'distance_from_airport' => 'nullable|string|max:100',
            'map_embed_url' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'main_image' => 'nullable|file|max:2048',
            'images.*' => 'nullable|file|max:2048',
            'facilities.*.name' => 'nullable|string|max:255',
            'facilities.*.description' => 'nullable|string|max:500',
            'facilities.*.image' => 'nullable|file|max:2048',
            'surroundings.*.name' => 'nullable|string|max:255',
            'surroundings.*.description' => 'nullable|string|max:500',
            'surroundings.*.image' => 'nullable|file|max:2048',
            'perfect_for' => 'nullable|string',
            'status' => 'required|in:available,fully_owned,coming_soon'
        ]);

        // Validate image extensions manually
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
        
        if ($request->hasFile('main_image')) {
            $ext = strtolower($request->file('main_image')->getClientOriginalExtension());
            if (!in_array($ext, $allowedExtensions)) {
                return back()->withErrors(['main_image' => 'Main image must be: jpeg, png, jpg, gif, webp, or avif.']);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $ext = strtolower($image->getClientOriginalExtension());
                if (!in_array($ext, $allowedExtensions)) {
                    return back()->withErrors(["images.$key" => "Image must be: jpeg, png, jpg, gif, webp, or avif."]);
                }
            }
        }

        $validated = $request->all();

        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);

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

        // Handle Facilities with images
        $facilitiesData = [];
        if ($request->has('facilities')) {
            foreach ($request->input('facilities') as $index => $facility) {
                if (!empty($facility['name'])) {
                    $facilityData = [
                        'name' => $facility['name'],
                        'description' => $facility['description'] ?? '',
                        'image' => ''
                    ];

                    // Handle facility image upload
                    if ($request->hasFile("facilities.$index.image")) {
                        $facilityImage = $request->file("facilities.$index.image");
                        $facilityImageName = time() . '_facility_' . $index . '_' . $facilityImage->getClientOriginalName();
                        $facilityImage->move(public_path('images/facilities'), $facilityImageName);
                        $facilityData['image'] = 'images/facilities/' . $facilityImageName;
                    }

                    $facilitiesData[] = $facilityData;
                }
            }
        }
        $validated['facilities'] = $facilitiesData;

        // Handle Surroundings with images
        $surroundingsData = [];
        if ($request->has('surroundings')) {
            foreach ($request->input('surroundings') as $index => $surrounding) {
                if (!empty($surrounding['name'])) {
                    $surroundingData = [
                        'name' => $surrounding['name'],
                        'description' => $surrounding['description'] ?? '',
                        'image' => ''
                    ];

                    // Handle surrounding image upload
                    if ($request->hasFile("surroundings.$index.image")) {
                        $surroundingImage = $request->file("surroundings.$index.image");
                        $surroundingImageName = time() . '_surrounding_' . $index . '_' . $surroundingImage->getClientOriginalName();
                        $surroundingImage->move(public_path('images/surroundings'), $surroundingImageName);
                        $surroundingData['image'] = 'images/surroundings/' . $surroundingImageName;
                    }

                    $surroundingsData[] = $surroundingData;
                }
            }
        }
        $validated['surroundings'] = $surroundingsData;

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

        // Custom validation for images including AVIF
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'price' => 'required|numeric|min:0',
            'ownership' => 'nullable|string|max:100',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'land_area' => 'required|numeric|min:0',
            'building_area' => 'required|numeric|min:0',
            'built_in' => 'nullable|integer|min:1900|max:2100',
            'distance_from_airport' => 'nullable|string|max:100',
            'map_embed_url' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'main_image' => 'nullable|file|max:2048',
            'images.*' => 'nullable|file|max:2048',
            'facilities.*.name' => 'nullable|string|max:255',
            'facilities.*.description' => 'nullable|string|max:500',
            'facilities.*.image' => 'nullable|file|max:2048',
            'facilities.*.existing_image' => 'nullable|string',
            'surroundings.*.name' => 'nullable|string|max:255',
            'surroundings.*.description' => 'nullable|string|max:500',
            'surroundings.*.image' => 'nullable|file|max:2048',
            'surroundings.*.existing_image' => 'nullable|string',
            'perfect_for' => 'nullable|string',
            'status' => 'required|in:available,fully_owned,coming_soon'
        ]);

        // Validate image extensions manually
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
        
        if ($request->hasFile('main_image')) {
            $ext = strtolower($request->file('main_image')->getClientOriginalExtension());
            if (!in_array($ext, $allowedExtensions)) {
                return back()->withErrors(['main_image' => 'Main image must be: jpeg, png, jpg, gif, webp, or avif.']);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $ext = strtolower($image->getClientOriginalExtension());
                if (!in_array($ext, $allowedExtensions)) {
                    return back()->withErrors(["images.$key" => "Image must be: jpeg, png, jpg, gif, webp, or avif."]);
                }
            }
        }

        $validated = $request->all();

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

        // Handle Facilities with images
        $facilitiesData = [];
        if ($request->has('facilities')) {
            foreach ($request->input('facilities') as $index => $facility) {
                if (!empty($facility['name'])) {
                    $facilityData = [
                        'name' => $facility['name'],
                        'description' => $facility['description'] ?? '',
                        'image' => $facility['existing_image'] ?? ''
                    ];

                    // Handle facility image upload (new or replacement)
                    if ($request->hasFile("facilities.$index.image")) {
                        // Delete old image if exists
                        if (!empty($facility['existing_image']) && file_exists(public_path($facility['existing_image']))) {
                            unlink(public_path($facility['existing_image']));
                        }

                        $facilityImage = $request->file("facilities.$index.image");
                        $facilityImageName = time() . '_facility_' . $index . '_' . $facilityImage->getClientOriginalName();
                        $facilityImage->move(public_path('images/facilities'), $facilityImageName);
                        $facilityData['image'] = 'images/facilities/' . $facilityImageName;
                    }

                    $facilitiesData[] = $facilityData;
                }
            }
        }
        $validated['facilities'] = $facilitiesData;

        // Handle Surroundings with images
        $surroundingsData = [];
        if ($request->has('surroundings')) {
            foreach ($request->input('surroundings') as $index => $surrounding) {
                if (!empty($surrounding['name'])) {
                    $surroundingData = [
                        'name' => $surrounding['name'],
                        'description' => $surrounding['description'] ?? '',
                        'image' => $surrounding['existing_image'] ?? ''
                    ];

                    // Handle surrounding image upload (new or replacement)
                    if ($request->hasFile("surroundings.$index.image")) {
                        // Delete old image if exists
                        if (!empty($surrounding['existing_image']) && file_exists(public_path($surrounding['existing_image']))) {
                            unlink(public_path($surrounding['existing_image']));
                        }

                        $surroundingImage = $request->file("surroundings.$index.image");
                        $surroundingImageName = time() . '_surrounding_' . $index . '_' . $surroundingImage->getClientOriginalName();
                        $surroundingImage->move(public_path('images/surroundings'), $surroundingImageName);
                        $surroundingData['image'] = 'images/surroundings/' . $surroundingImageName;
                    }

                    $surroundingsData[] = $surroundingData;
                }
            }
        }
        $validated['surroundings'] = $surroundingsData;

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

    /**
     * Delete a specific additional image from property
     */
    public function deleteImage(string $id, int $index)
    {
        $property = Property::findOrFail($id);
        
        if (!$property->images || !isset($property->images[$index])) {
            return response()->json(['success' => false, 'message' => 'Image not found'], 404);
        }

        $imagePath = $property->images[$index];
        
        // Delete the physical file
        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }

        // Remove from array
        $images = $property->images;
        array_splice($images, $index, 1);
        
        // Update property
        $property->images = array_values($images); // Re-index array
        $property->save();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
    }
}

