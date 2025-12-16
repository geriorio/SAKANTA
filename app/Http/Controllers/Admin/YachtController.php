<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Yacht;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class YachtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $yachts = Yacht::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.yachts.index', compact('yachts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.yachts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Basic Information
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'ownership' => 'required|string|max:100',
            'shares_committed' => 'nullable|string|max:100',
            'brand' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'show' => 'required|in:show,hide',
            
            // Specifications
            'length_overall' => 'required|string|max:100',
            'beam' => 'required|string|max:100',
            'height' => 'required|string|max:100',
            'draft' => 'required|string|max:100',
            'loaded_displacement' => 'required|string|max:100',
            'cruising_speed' => 'required|string|max:100',
            'max_speed' => 'required|string|max:100',
            'main_engine' => 'required|string|max:255',
            'range' => 'required|string|max:100',
            'stabilizer' => 'required|string|max:255',
            'hull_material' => 'required|string|max:255',
            'generator' => 'nullable|string|max:255',
            'solar_panels' => 'nullable|string|max:255',
            
            // Accommodations
            'maximum_passengers' => 'required|integer|min:1',
            'cabins' => 'required|string|max:100',
            'berths' => 'required|string|max:100',
            'heads' => 'required|string|max:100',
            
            // Tankage
            'fuel_capacity' => 'required|string|max:100',
            'freshwater_capacity' => 'required|string|max:100',
            'holding_tank' => 'required|string|max:100',
            
            // Warranties
            'hull_structure' => 'required|string',
            'equipment' => 'required|string',
            
            // Project
            'certifications' => 'required|string',
            
            // Details
            'details.*.title' => 'nullable|string|max:255',
            'details.*.subtitle' => 'nullable|string|max:500',
            
            // Brochure
            'brochure_url' => 'nullable|url|max:500',
            
            // Images
            'main_image' => 'nullable|file|max:2048',
            'gallery_images.*' => 'nullable|file|max:2048',
        ]);

        // Validate image extensions manually
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
        
        if ($request->hasFile('main_image')) {
            $ext = strtolower($request->file('main_image')->getClientOriginalExtension());
            if (!in_array($ext, $allowedExtensions)) {
                return back()->withErrors(['main_image' => 'Main image must be: jpeg, png, jpg, gif, webp, or avif.']);
            }
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $key => $image) {
                $ext = strtolower($image->getClientOriginalExtension());
                if (!in_array($ext, $allowedExtensions)) {
                    return back()->withErrors(["gallery_images.$key" => "Gallery image must be: jpeg, png, jpg, gif, webp, or avif."]);
                }
            }
        }

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('images/yachts'), $mainImageName);
            $validated['main_image'] = 'images/yachts/' . $mainImageName;
        }

        // Handle brand logo upload
        if ($request->hasFile('brand_logo')) {
            $brandLogo = $request->file('brand_logo');
            $brandLogoName = time() . '_logo_' . $brandLogo->getClientOriginalName();
            $brandLogo->move(public_path('images/yachts'), $brandLogoName);
            $validated['brand_logo'] = 'images/yachts/' . $brandLogoName;
        }

        // Handle gallery images upload
        $galleryPaths = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $index => $image) {
                $imageName = time() . '_gallery_' . $index . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/yachts'), $imageName);
                $galleryPaths[] = 'images/yachts/' . $imageName;
            }
        }
        $validated['gallery_images'] = $galleryPaths;

        // Generate slug from name
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        
        // Ensure slug is unique
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Yacht::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        Yacht::create($validated);

        return redirect()->route('admin.yachts.index')
            ->with('success', 'Yacht created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Yacht $yacht)
    {
        return view('admin.yachts.show', compact('yacht'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Yacht $yacht)
    {
        return view('admin.yachts.edit', compact('yacht'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Yacht $yacht)
    {
        $validated = $request->validate([
            // Basic Information
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'ownership' => 'required|string|max:100',
            'shares_committed' => 'nullable|string|max:100',
            'brand' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'show' => 'required|in:show,hide',
            
            // Specifications
            // Specifications
            'length_overall' => 'required|string|max:100',
            'beam' => 'required|string|max:100',
            'height' => 'required|string|max:100',
            'draft' => 'required|string|max:100',
            'loaded_displacement' => 'required|string|max:100',
            'cruising_speed' => 'required|string|max:100',
            'max_speed' => 'required|string|max:100',
            'main_engine' => 'required|string|max:255',
            'range' => 'required|string|max:100',
            'stabilizer' => 'required|string|max:255',
            'hull_material' => 'required|string|max:255',
            'generator' => 'nullable|string|max:255',
            'solar_panels' => 'nullable|string|max:255',
            
            // Accommodations
            'maximum_passengers' => 'required|integer|min:1',
            'cabins' => 'required|string|max:100',
            'berths' => 'required|string|max:100',
            'heads' => 'required|string|max:100',
            
            // Tankage
            'fuel_capacity' => 'required|string|max:100',
            'freshwater_capacity' => 'required|string|max:100',
            'holding_tank' => 'required|string|max:100',
            
            // Warranties
            'hull_structure' => 'required|string',
            'equipment' => 'required|string',
            
            // Project
            'certifications' => 'required|string',
            
            // Details
            'details.*.title' => 'nullable|string|max:255',
            'details.*.subtitle' => 'nullable|string|max:500',
            
            // Brochure
            'brochure_url' => 'nullable|url|max:500',
            
            // Imagess
            'details.*.title' => 'nullable|string|max:255',
            'details.*.subtitle' => 'nullable|string|max:500',
            
            // Brochure
            'brochure_url' => 'nullable|url|max:500',
            
            // Images
            'main_image' => 'nullable|file|max:2048',
            'brand_logo' => 'nullable|file|max:2048',
            'gallery_images.*' => 'nullable|file|max:2048',
        ]);

        // Validate image extensions manually
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
        
        if ($request->hasFile('main_image')) {
            $ext = strtolower($request->file('main_image')->getClientOriginalExtension());
            if (!in_array($ext, $allowedExtensions)) {
                return back()->withErrors(['main_image' => 'Main image must be: jpeg, png, jpg, gif, webp, or avif.']);
            }
        }

        if ($request->hasFile('brand_logo')) {
            $ext = strtolower($request->file('brand_logo')->getClientOriginalExtension());
            if (!in_array($ext, $allowedExtensions)) {
                return back()->withErrors(['brand_logo' => 'Brand logo must be: jpeg, png, jpg, gif, webp, or avif.']);
            }
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $key => $image) {
                $ext = strtolower($image->getClientOriginalExtension());
                if (!in_array($ext, $allowedExtensions)) {
                    return back()->withErrors(["gallery_images.$key" => "Gallery image must be: jpeg, png, jpg, gif, webp, or avif."]);
                }
            }
        }

        // Handle main image upload (replace old one if exists)
        if ($request->hasFile('main_image')) {
            // Delete old main image
            if ($yacht->main_image && file_exists(public_path($yacht->main_image))) {
                unlink(public_path($yacht->main_image));
            }
            
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('images/yachts'), $mainImageName);
            $validated['main_image'] = 'images/yachts/' . $mainImageName;
        }

        // Handle brand logo upload (replace old one if exists)
        if ($request->hasFile('brand_logo')) {
            // Delete old brand logo
            if ($yacht->brand_logo && file_exists(public_path($yacht->brand_logo))) {
                unlink(public_path($yacht->brand_logo));
            }
            
            $brandLogo = $request->file('brand_logo');
            $brandLogoName = time() . '_logo_' . $brandLogo->getClientOriginalName();
            $brandLogo->move(public_path('images/yachts'), $brandLogoName);
            $validated['brand_logo'] = 'images/yachts/' . $brandLogoName;
        }

        // Handle gallery images upload (append to existing)
        if ($request->hasFile('gallery_images')) {
            $existingGallery = $yacht->gallery_images ?? [];
            
            foreach ($request->file('gallery_images') as $index => $image) {
                $imageName = time() . '_gallery_' . $index . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/yachts'), $imageName);
                $existingGallery[] = 'images/yachts/' . $imageName;
            }
            
            $validated['gallery_images'] = $existingGallery;
        }

        $yacht->update($validated);

        return redirect()->route('admin.yachts.index')
            ->with('success', 'Yacht updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Yacht $yacht)
    {
        // Delete main image
        if ($yacht->main_image && file_exists(public_path($yacht->main_image))) {
            unlink(public_path($yacht->main_image));
        }

        // Delete gallery images
        if ($yacht->gallery_images) {
            foreach ($yacht->gallery_images as $imagePath) {
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }
            }
        }

        $yacht->delete();

        return redirect()->route('admin.yachts.index')
            ->with('success', 'Yacht deleted successfully!');
    }

    /**
     * Delete a specific gallery image
     */
    public function deleteImage(Yacht $yacht, $index)
    {
        $galleryImages = $yacht->gallery_images ?? [];
        
        if (isset($galleryImages[$index])) {
            // Delete the file
            if (file_exists(public_path($galleryImages[$index]))) {
                unlink(public_path($galleryImages[$index]));
            }
            
            // Remove from array
            unset($galleryImages[$index]);
            $galleryImages = array_values($galleryImages); // Re-index array
            
            // Update the yacht
            $yacht->update(['gallery_images' => $galleryImages]);
            
            return back()->with('success', 'Image deleted successfully!');
        }
        
        return back()->with('error', 'Image not found!');
    }
}
