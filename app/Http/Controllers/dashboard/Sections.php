<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Sections extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('dashboard.sections', compact('sections'));
    }

    public function show($id)
    {
        $section = Section::find($id);
        $branches = User::where('role', 'branch')->get();
        $sectionsNotImage = Section::where('image', null)->get();
        return view('section', compact('section', 'branches', 'sectionsNotImage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|unique:sections,name_ar',
            'description_ar' => 'nullable|string',
            'name_en' => 'required|unique:sections,name_en',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        Section::create($data);

        return redirect()->route('sections.index')->with('success', 'Section created successfully.');
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name_ar' => 'required|unique:sections,name_ar,' . $section->id,
            'description_ar' => 'nullable|string',
            'name_en' => 'required|unique:sections,name_en,' . $section->id,
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($section->image && File::exists(public_path($section->image))) {
                File::delete(public_path($section->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $section->update($data);

        return redirect()->route('sections.index')->with('success', 'Section updated successfully.');
    }

    public function destroy(Section $section)
    {
        if ($section->image && File::exists(public_path($section->image))) {
            File::delete(public_path($section->image));
        }

        $section->delete();

        return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
    }
}