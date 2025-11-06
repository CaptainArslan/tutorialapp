<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function create()
    {
        return view('tutorials.create');
    }

    public function edit(Tutorial $tutorial)
    {
        return view('tutorials.edit', compact('tutorial'));
    }

    public function media(Tutorial $tutorial)
    {
        return view('tutorials.media', compact('tutorial'));
    }

    public function steps(Tutorial $tutorial)
    {
        return view('tutorials.steps', compact('tutorial'));
    }

    public function publish(Tutorial $tutorial)
    {
        return view('tutorials.publish', compact('tutorial'));
    }
}
