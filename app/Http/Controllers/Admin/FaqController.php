<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs
     */
    public function index()
    {
        $faqs = Faq::paginate(10);
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new FAQ
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created FAQ
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:faqs',
            'description' => 'required|string',
            'hero_small_title' => 'required|string|max:255',
            'hero_big_title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
            'questions' => 'required|array|min:1',
            'questions.*.question' => 'required|string',
            'questions.*.answer' => 'required|string',
        ]);

        // Handle icon upload
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconPath = $file->store('faqs', 'public');
        }

        // Create FAQ
        $faq = Faq::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'hero_small_title' => $validated['hero_small_title'],
            'hero_big_title' => $validated['hero_big_title'],
            'icon' => $iconPath,
        ]);

        // Create questions
        foreach ($validated['questions'] as $index => $q) {
            FaqQuestion::create([
                'faq_id' => $faq->id,
                'question' => $q['question'],
                'answer' => $q['answer'],
                'order' => $index,
            ]);
        }

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully!');
    }

    /**
     * Show the form for editing the specified FAQ
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified FAQ
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:faqs,title,' . $faq->id,
            'description' => 'required|string',
            'hero_small_title' => 'required|string|max:255',
            'hero_big_title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,gif,webp|max:2048',
            'questions' => 'required|array|min:1',
            'questions.*.question' => 'required|string',
            'questions.*.answer' => 'required|string',
        ]);

        // Handle icon upload
        $iconPath = $faq->icon;
        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($faq->icon && Storage::disk('public')->exists($faq->icon)) {
                Storage::disk('public')->delete($faq->icon);
            }
            $file = $request->file('icon');
            $iconPath = $file->store('faqs', 'public');
        }

        // Update FAQ
        $faq->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'hero_small_title' => $validated['hero_small_title'],
            'hero_big_title' => $validated['hero_big_title'],
            'icon' => $iconPath,
        ]);

        // Delete old questions and create new ones
        $faq->questions()->delete();
        foreach ($validated['questions'] as $index => $q) {
            FaqQuestion::create([
                'faq_id' => $faq->id,
                'question' => $q['question'],
                'answer' => $q['answer'],
                'order' => $index,
            ]);
        }

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully!');
    }

    /**
     * Remove the specified FAQ
     */
    public function destroy(Faq $faq)
    {
        $faq->questions()->delete();
        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully!');
    }
}

