<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Location;
use App\Models\Faq;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display listings page with location carousel
     */
    public function listings(Request $request)
    {
        $locations = Location::all();
        $listings = Property::latest()
                           ->get();
        
        return view('listings', compact('locations', 'listings'));
    }

    /**
     * Display properties for a specific location
     */
    public function showLocation(Location $location)
    {
        $properties = $location->properties()
                               ->latest()
                               ->paginate(12);
        
        return view('locations', compact('location', 'properties'));
    }

    /**
     * Display article for a specific location
     */
    public function showArticle(Location $location)
    {
        $article = $location->article;
        
        if (!$article) {
            abort(404, 'Article not found for this location');
        }
        
        // Get ownership FAQ - find FAQ with slug containing 'owner' or 'co-owner'
        $ownershipFaq = Faq::where('slug', 'like', '%owner%')
            ->orWhere('slug', 'like', '%co-owner%')
            ->orWhere('title', 'like', '%ownership%')
            ->orWhere('title', 'like', '%co-owner%')
            ->first();
        
        return view('location-article', compact('location', 'article', 'ownershipFaq'));
    }

    public function index(Request $request)
    {
        $query = Property::where('status', 'available');

        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan tipe property
        if ($request->filled('type')) {
            $query->where('property_type', $request->type);
        }

        // Filter berdasarkan harga
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter berdasarkan kota
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        $properties = $query->latest()->paginate(12);
        $cities = Property::distinct()->pluck('city');
        $propertyTypes = Property::distinct()->pluck('property_type');

        return view('properties.index', compact('properties', 'cities', 'propertyTypes'));
    }

    public function show(Property $property)
    {
        // Calculate price range (±20% from current property price)
        $minPrice = $property->price * 0.8;
        $maxPrice = $property->price * 1.2;

        // First, try to get properties within 20% price range
        $relatedProperties = Property::where('id', '!=', $property->id)
            ->where('status', 'available')
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->inRandomOrder()
            ->take(4)
            ->get();

        // If we don't have 4 properties, get the closest ones by price
        if ($relatedProperties->count() < 4) {
            $needed = 4 - $relatedProperties->count();
            $excludeIds = $relatedProperties->pluck('id')->push($property->id)->toArray();
            
            // Get closest properties by price difference
            $closestProperties = Property::whereNotIn('id', $excludeIds)
                ->where('status', 'available')
                ->selectRaw('*, ABS(price - ?) as price_diff', [$property->price])
                ->orderBy('price_diff', 'asc')
                ->take($needed)
                ->get();
            
            // Merge the collections
            $relatedProperties = $relatedProperties->merge($closestProperties);
        }

        return view('properties.show', compact('property', 'relatedProperties'));
    }

    /**
     * Search for locations and properties (API endpoint for navbar search)
     */
    public function search(Request $request)
    {
        $query = $request->input('q', '');
        
        if (empty($query)) {
            return response()->json([
                'locations' => [],
                'properties' => []
            ]);
        }

        // Search locations
        $locations = Location::where('name', 'like', "%{$query}%")
            ->withCount('properties')
            ->limit(5)
            ->get()
            ->map(function($location) {
                return [
                    'name' => $location->name,
                    'slug' => $location->slug,
                    'properties_count' => $location->properties_count
                ];
            });

        // Search properties - by title OR by location name
        $properties = Property::where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('city', 'like', "%{$query}%")
                  ->orWhere('address', 'like', "%{$query}%")
                  // Search by location name (if property has a location)
                  ->orWhereHas('location', function($locationQuery) use ($query) {
                      $locationQuery->where('name', 'like', "%{$query}%");
                  });
            })
            ->with('location')
            ->limit(8)
            ->get()
            ->map(function($property) {
                return [
                    'name' => $property->title,
                    'slug' => $property->slug,
                    'main_image' => $property->main_image ? asset($property->main_image) : null,
                    'location_name' => $property->location ? $property->location->name : null
                ];
            });

        return response()->json([
            'locations' => $locations,
            'properties' => $properties
        ]);
    }
}
