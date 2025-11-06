<?php

namespace App\Livewire\Tutorial;

use App\Models\Tutorial;
use Livewire\Component;

class PublishTutorial extends Component
{
    public Tutorial $tutorial;

    public function mount(Tutorial $tutorial)
    {
        $this->tutorial = $tutorial;
        $this->tutorial->load(['steps.media', 'steps.highlights']);
    }

    public function publish()
    {
        $this->tutorial->update(['status' => 'published']);
        return redirect()->route('tutorials.show', ['tutorial' => $this->tutorial->slug]);
    }

    public function render()
    {
        return view('livewire.tutorial.publish-tutorial');
    }
}
