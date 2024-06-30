<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\gallary as Gallary;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    public function index()
    {
        $galleries = Gallary::all();
        return view('dashboard.gallary', compact('galleries'));
    }

    // Store a newly created gallery in storage.
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $gallery = new Gallary();

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $fileName);
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

        $gallery = Gallary::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($gallery->image && file_exists(public_path('images/' . $gallery->image))) {
                unlink(public_path('images/' . $gallery->image));
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $fileName);
            $gallery->image = $fileName;
        }

        $gallery->save();

        return redirect()->back()->with('success', 'Gallery updated successfully.');
    }

    // Remove the specified gallery from storage.
    public function destroy($id)
    {
        $gallery = Gallary::findOrFail($id);

        // Delete the image file
        if ($gallery->image && file_exists(public_path('images/' . $gallery->image))) {
            unlink(public_path('images/' . $gallery->image));
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery deleted successfully.');
    }
}
