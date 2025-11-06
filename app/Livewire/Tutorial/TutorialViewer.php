<?php

namespace App\Livewire\Tutorial;

use App\Models\Tutorial;
use Livewire\Component;

class TutorialViewer extends Component
{
    public Tutorial $tutorial;
    public $currentStepIndex = 0;

    public function mount(Tutorial $tutorial)
    {
        $this->tutorial = $tutorial;
        $this->tutorial->load(['steps.media', 'steps.highlights']);
    }

    public function nextStep()
    {
        if ($this->currentStepIndex < count($this->tutorial->steps) - 1) {
            $this->currentStepIndex++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStepIndex > 0) {
            $this->currentStepIndex--;
        }
    }

    public function goToStep($index)
    {
        if ($index >= 0 && $index < count($this->tutorial->steps)) {
            $this->currentStepIndex = $index;
        }
    }

    public function getCurrentStepProperty()
    {
        return $this->tutorial->steps[$this->currentStepIndex] ?? null;
    }

    public function render()
    {
        return view('livewire.tutorial.tutorial-viewer');
    }
}
