<?php

namespace App\Livewire\Tutorial;

use App\Models\Tutorial;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaManager extends Component
{
    use WithFileUploads;

    public Tutorial $tutorial;
    public $uploads = [];
    public $mediaItems = [];

    public function mount(Tutorial $tutorial)
    {
        $this->tutorial = $tutorial;
        $this->loadMedia();
    }

    public function loadMedia()
    {
        $this->mediaItems = $this->tutorial->getMedia('tutorial_files')->map(function ($media) {
            return [
                'id' => $media->id,
                'name' => $media->name ?? 'Untitled',
                'url' => $media->getUrl(),
            ];
        })->toArray();
    }

    public function upload()
    {
        $this->validate([
            'uploads.*' => 'required|image|max:10240', // 10MB max
        ]);

        if (empty($this->uploads)) {
            session()->flash('error', 'Please select at least one file to upload.');
            return;
        }

        $uploadedCount = 0;
        foreach ($this->uploads as $file) {
            try {
                // Store the file temporarily in the public disk
                $path = $file->store('temp', 'public');
                $fullPath = storage_path('app/public/' . $path);
                
                // Verify file exists before adding to media library
                if (!file_exists($fullPath)) {
                    $this->dispatch('show-error', message: 'Failed to store file: ' . $file->getClientOriginalName());
                    continue;
                }
                
                // Add to media library (Spatie will copy the file to its own location)
                $this->tutorial->addMedia($fullPath)
                    ->usingName($file->getClientOriginalName())
                    ->usingFileName($file->getClientOriginalName())
                    ->toMediaCollection('tutorial_files');
                
                $uploadedCount++;
                
                // Clean up temporary file after Spatie has copied it
                if (file_exists($fullPath)) {
                    @unlink($fullPath);
                }
            } catch (\Exception $e) {
                $this->dispatch('show-error', message: 'Error uploading ' . $file->getClientOriginalName() . ': ' . $e->getMessage());
            }
        }

        $this->uploads = [];
        $this->loadMedia();
        
        if ($uploadedCount > 0) {
            session()->flash('message', $uploadedCount . ' file(s) uploaded successfully!');
        }
        
        $this->dispatch('media-uploaded');
    }

    public function deleteMedia($mediaId)
    {
        $media = Media::find($mediaId);
        if ($media && $media->model_id === $this->tutorial->id) {
            $media->delete();
            $this->loadMedia();
        }
    }

    public function updateMediaOrder($order)
    {
        foreach ($order as $position => $mediaId) {
            Media::where('id', $mediaId)
                ->where('model_id', $this->tutorial->id)
                ->update(['order_column' => $position + 1]);
        }
        $this->loadMedia();
    }

    public function continueToSteps()
    {
        return redirect()->route('tutorials.steps', ['tutorial' => $this->tutorial->slug]);
    }

    public function render()
    {
        return view('livewire.tutorial.media-manager');
    }
}
