<?php

namespace App\Livewire\Tutorial;

use App\Models\Tutorial;
use App\Models\TutorialStep;
use App\Models\TutorialStepHighlight;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StepBuilder extends Component
{
    public Tutorial $tutorial;
    public $steps = [];
    public $selectedStep = null;
    public $editingStep = null;
    public $showStepForm = false;
    public $formData = [
        'media_id' => null,
        'title' => '',
        'description' => '',
        'highlights' => [],
    ];

    public function mount(Tutorial $tutorial)
    {
        $this->tutorial = $tutorial;
        $this->loadSteps();
    }

    public function loadSteps()
    {
        $this->steps = $this->tutorial->steps()->with('media', 'highlights')->get()->toArray();
    }

    public function createStep()
    {
        $this->editingStep = null;
        $this->formData = [
            'media_id' => null,
            'title' => '',
            'description' => '',
            'highlights' => [],
        ];
        $this->showStepForm = true;
    }

    public function editStep($stepId)
    {
        $step = TutorialStep::with('media', 'highlights')->find($stepId);
        $this->editingStep = $stepId;
        $this->formData = [
            'media_id' => $step->media_id,
            'title' => $step->title,
            'description' => $step->description,
            'highlights' => $step->highlights->map(function ($highlight) {
                return [
                    'id' => $highlight->id,
                    'x' => $highlight->x,
                    'y' => $highlight->y,
                    'width' => $highlight->width,
                    'height' => $highlight->height,
                    'data' => $highlight->data,
                ];
            })->toArray(),
        ];
        $this->showStepForm = true;
    }

    public function saveStep()
    {
        $this->validate([
            'formData.media_id' => 'required|exists:media,id',
            'formData.title' => 'required|string|min:3|max:255',
            'formData.description' => 'nullable|string',
        ]);

        $order = TutorialStep::where('tutorial_id', $this->tutorial->id)->max('order') + 1;

        if ($this->editingStep) {
            $step = TutorialStep::find($this->editingStep);
            $step->update([
                'media_id' => $this->formData['media_id'],
                'title' => $this->formData['title'],
                'description' => $this->formData['description'],
            ]);
            $step->highlights()->delete();
        } else {
            $step = TutorialStep::create([
                'tutorial_id' => $this->tutorial->id,
                'media_id' => $this->formData['media_id'],
                'title' => $this->formData['title'],
                'description' => $this->formData['description'],
                'order' => $order,
            ]);
        }

        // Save highlights
        if (!empty($this->formData['highlights'])) {
            foreach ($this->formData['highlights'] as $highlightData) {
                TutorialStepHighlight::create([
                    'tutorial_step_id' => $step->id,
                    'x' => $highlightData['x'] ?? 0,
                    'y' => $highlightData['y'] ?? 0,
                    'width' => $highlightData['width'] ?? 0,
                    'height' => $highlightData['height'] ?? 0,
                    'data' => $highlightData['data'] ?? [],
                ]);
            }
        }

        $this->loadSteps();
        $this->showStepForm = false;
        $this->resetForm();
    }

    public function addHighlight($highlightData)
    {
        $this->formData['highlights'][] = $highlightData;
        $this->dispatch('highlight-added');
    }

    public function syncHighlights($highlights)
    {
        $this->formData['highlights'] = $highlights;
    }

    public function removeHighlight($index)
    {
        unset($this->formData['highlights'][$index]);
        $this->formData['highlights'] = array_values($this->formData['highlights']);
    }

    public function deleteStep($stepId)
    {
        TutorialStep::find($stepId)->delete();
        $this->loadSteps();
    }

    public function updateStepOrder($order)
    {
        foreach ($order as $position => $stepId) {
            TutorialStep::where('id', $stepId)
                ->where('tutorial_id', $this->tutorial->id)
                ->update(['order' => $position]);
        }
        $this->loadSteps();
    }

    public function resetForm()
    {
        $this->formData = [
            'media_id' => null,
            'title' => '',
            'description' => '',
            'highlights' => [],
        ];
        $this->editingStep = null;
    }

    public function cancelForm()
    {
        $this->showStepForm = false;
        $this->resetForm();
    }

    public function continueToPublish()
    {
        return redirect()->route('tutorials.publish', ['tutorial' => $this->tutorial->slug]);
    }

    public function render()
    {
        $mediaItems = $this->tutorial->getMedia('tutorial_files');
        return view('livewire.tutorial.step-builder', compact('mediaItems'));
    }
}
