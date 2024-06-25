<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    public function index()
    {
        $sectionsNotImage = Section::where('image', null)->get();
        $sectionsWithImage = Section::where('image', '!=', null)->get();
        return view('welcome', compact('sectionsNotImage', 'sectionsWithImage'));
    }
}
