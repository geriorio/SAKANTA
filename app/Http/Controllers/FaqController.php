<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Property;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display listing of all FAQ categories
     */
    public function index()
    {
        $faqs = Faq::all();
        $featuredListings = Property::inRandomOrder()->get();
        return view('faq-list', compact('faqs', 'featuredListings'));
    }

    /**
     * Display specific FAQ category with questions
     */
    public function show(Faq $faq)
    {
        $featuredListings = Property::inRandomOrder()->get();
        return view('faq-detail', compact('faq', 'featuredListings'));
    }
}
