<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Property;
use App\Models\Yacht;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display listing of all FAQ categories
     */
    public function index()
    {
        $faqsHomes = Faq::where('type', 'homes')->get();
        $faqsSail = Faq::where('type', 'sail')->get();
        $featuredListings = Property::inRandomOrder()->get();
        return view('faq-list', compact('faqsHomes', 'faqsSail', 'featuredListings'));
    }

    /**
     * Display specific FAQ category with questions
     */
    public function show(Faq $faq)
    {
        if ($faq->type === 'sail') {
            $featuredListings = \App\Models\Yacht::inRandomOrder()->get();
        } else {
            $featuredListings = Property::inRandomOrder()->get();
        }
        return view('faq-detail', compact('faq', 'featuredListings'));
    }
}
