<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::where('is_featured', true)
            ->where('status', 'available')
            ->latest()
            ->take(6)
            ->get();

        $latestProperties = Property::where('status', 'available')
            ->latest()
            ->take(8)
            ->get();

        return view('home', compact('featuredProperties', 'latestProperties'));
    }
}
