<?php

namespace App\Http\Controllers;

use App\Models\gallary;
use App\Models\Section;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $sectionsNotImage = Section::where('image', null)->get();
        $sectionsWithImage = Section::where('image', '!=', null)->get();
        $gallarys = gallary::where('user_id', null)->get();
        $branches = User::where('role', 'branch')->get();
        $siteSetting = SiteSetting::first();
        return view('welcome', compact('sectionsNotImage', 'sectionsWithImage', 'branches', 'gallarys', 'siteSetting'));
    }

    public function branch($id)
    {
        $sectionsNotImage = Section::where('image', null)->get();
        $branches = User::where('role', 'branch')->get();
        $branch = User::find($id);
        $gallarys = $branch->gallarys;
        return view('branch', compact('sectionsNotImage', 'branches', 'branch', 'gallarys'));
    }

    public function otherPage($id)
    {
        $section = Section::find($id);
        $branches = User::all();
        $sectionsNotImage = Section::where('image', null)->get();
        return view('section', compact('section', 'branches', 'sectionsNotImage'));
    }
}
