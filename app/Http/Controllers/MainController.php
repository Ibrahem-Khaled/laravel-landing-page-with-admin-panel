<?php

namespace App\Http\Controllers;

use App\Models\gallary;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $sectionsNotImage = Section::where('image', null)->get();
        $sectionsWithImage = Section::where('image', '!=', null)->get();
        $gallarys = gallary::all();
        $branches = User::all();
        return view('welcome', compact('sectionsNotImage', 'sectionsWithImage', 'branches', 'gallarys'));
    }

    public function branch($id)
    {
        $sectionsNotImage = Section::where('image', null)->get();
        $branches = User::all();
        $branch = User::find($id);
        return view('branch', compact('sectionsNotImage', 'branches', 'branch'));
    }
}
