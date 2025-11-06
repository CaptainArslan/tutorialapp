<?php

namespace App\Livewire\Tutorial;

use App\Models\Tutorial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateTutorial extends Component
{
    public $title = '';
    public $slug = '';
    public $tutorial = null;

    protected $rules = [
        'title' => 'required|string|min:3|max:255',
    ];

    public function mount(?Tutorial $tutorial = null)
    {
        if ($tutorial != null) {
            $this->tutorial = $tutorial;
            $this->title = $tutorial->title;
            $this->slug = $tutorial->slug;
        }
    }

    public function updatedTitle($value)
    {
        $this->slug = $value ? Str::slug($value) : '';
        $this->slug = $this->makeUniqueSlug($this->slug);
    }
    private function makeUniqueSlug($slug, $excludeId = null)
    {
        if (empty($slug)) {
            return $slug;
        }

        $original = $slug;
        $count = 1;

        // Check for uniqueness, excluding current tutorial if editing
        while (Tutorial::where('slug', $slug)
            ->when($excludeId, function ($query) use ($excludeId) {
                return $query->where('id', '!=', $excludeId);
            })
            ->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }

    public function save()
    {
        $this->validate();

        // Ensure slug is always generated and unique before saving
        $slug = $this->slug ?: Str::slug($this->title);
        
        // Make slug unique (exclude current tutorial if editing)
        $excludeId = $this->tutorial ? $this->tutorial->id : null;
        $slug = $this->makeUniqueSlug($slug, $excludeId);

        // if ($this->tutorial != null) {
        //     // Editing
        //     $this->tutorial->update([
        //         'title' => $this->title,
        //         'slug' => $slug,
        //     ]);
            
        //     // Refresh to get the updated slug
        //     $this->tutorial->refresh();

        //     return redirect()->route('tutorials.media', ['tutorial' => $this->tutorial->slug]);
        // }

        // Creating new tutorial
        $tutorial = Tutorial::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'slug' => $slug,
            'status' => 'draft',
        ]);

        // Refresh to ensure we have the correct slug
        $tutorial->refresh();

        return redirect()->route('tutorials.media', ['tutorial' => $tutorial->slug]);
    }

    public function render()
    {
        return view('livewire.tutorial.create-tutorial');
    }
}
