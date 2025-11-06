<?php

namespace App\Livewire\Tutorial;

use App\Models\Tutorial;
use Livewire\Component;

class TutorialList extends Component
{
    public function render()
    {
        $tutorials = Tutorial::where('status', 'published')
            ->with('user')
            ->latest()
            ->paginate(12);

        return view('livewire.tutorial.tutorial-list', compact('tutorials'));
    }
}
