<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // List all About entries
    public function index() {
        $abouts = About::latest()->get();
        return view('admin.about.index', compact('abouts'));
    }

    // Show create form
    public function create() {
        return view('admin.about.create');
    }

    // Store new About
    public function store(Request $request) {
        $data = $request->validate([
            'year' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'inverted' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('abouts', 'public');
        }

        $data['inverted'] = $request->has('inverted');

        About::create($data);

        return redirect()->route('admin.abouts.index')->with('success', 'About created.');
    }

    // Show edit form
    public function edit(About $about) {
        return view('admin.about.edit', compact('about'));
    }

    // Update About
    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'year' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);


        $data['inverted'] = $request->has('inverted');


        if ($request->hasFile('image')) {


            if ($about->image && \Storage::disk('public')->exists($about->image)) {
                \Storage::disk('public')->delete($about->image);
            }

            $data['image'] = $request->file('image')->store('abouts', 'public');
        }

        $about->update($data);

        return redirect()->route('admin.abouts.index')
            ->with('success', 'About updated.');
    }
    // Delete About
    public function destroy(About $about) {
        $about->delete();
        return redirect()->route('admin.abouts.index')->with('success', 'About deleted.');
    }
}
