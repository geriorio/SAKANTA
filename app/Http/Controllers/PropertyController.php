<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
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
            $query->where('price_per_share', '>=', $request->min_price);
        }
        
        if ($request->filled('max_price')) {
            $query->where('price_per_share', '<=', $request->max_price);
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
        $relatedProperties = Property::where('city', $property->city)
            ->where('id', '!=', $property->id)
            ->where('status', 'available')
            ->take(4)
            ->get();

        return view('properties.show', compact('property', 'relatedProperties'));
    }
}
