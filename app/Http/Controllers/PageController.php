<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function terms()
    {
        return view('terms');
    }

    public function disclaimer()
    {
        return view('disclaimer');
    }
}
