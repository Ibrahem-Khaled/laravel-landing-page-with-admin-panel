<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteSettingsController extends Controller
{
    public function index()
    {
        $siteSettings = SiteSetting::all();
        return view('dashboard.site-settings', compact('siteSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $siteSetting = new SiteSetting();
        if ($request->hasFile('image')) {
            // Save the image to the public path
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $siteSetting->image = 'images/' . $imageName;
        }
        $siteSetting->title = $request->title;
        $siteSetting->description = $request->description;
        $siteSetting->save();

        return redirect()->back()->with('success', 'Site setting created successfully.');
    }

    public function update(Request $request, SiteSetting $siteSetting)
    {
        $request->validate([
            'image' => 'nullable|image',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($siteSetting->image && File::exists(public_path($siteSetting->image))) {
                File::delete(public_path($siteSetting->image));
            }
            // Save the new image to the public path
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $siteSetting->image = 'images/' . $imageName;
        }
        $siteSetting->title = $request->title;
        $siteSetting->description = $request->description;
        $siteSetting->save();

        return redirect()->back()->with('success', 'Site setting updated successfully.');
    }

    public function destroy(SiteSetting $siteSetting)
    {
        // Delete the image if it exists
        if ($siteSetting->image && File::exists(public_path($siteSetting->image))) {
            File::delete(public_path($siteSetting->image));
        }
        $siteSetting->delete();

        return redirect()->back()->with('success', 'Site setting deleted successfully.');
    }
}
