<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\gallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GallaryController extends Controller
{
    public function index()
    {
        $galleries = gallary::all();
        return view('dashboard.gallary', compact('galleries'));
    }

    // Store a newly created gallery in storage.
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $gallery = new gallary();

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            $gallery->image = $fileName;
        }

        $gallery->save();

        return redirect()->back()->with('success', 'Gallery created successfully.');
    }

    // Update the specified gallery in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $gallery = gallary::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($gallery->image) {
                Storage::delete('public/images/' . $gallery->image);
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            $gallery->image = $fileName;
        }

        $gallery->save();

        return redirect()->back()->with('success', 'Gallery updated successfully.');
    }

    // Remove the specified gallery from storage.
    public function destroy($id)
    {
        $gallery = gallary::findOrFail($id);

        // Delete the image file
        if ($gallery->image) {
            Storage::delete('public/images/' . $gallery->image);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery deleted successfully.');
    }
}
