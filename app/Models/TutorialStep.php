<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TutorialStep extends Model
{
    use HasFactory;
    protected $fillable = [
        'tutorial_id',
        'media_id',
        'title',
        'description',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function tutorial(): BelongsTo
    {
        return $this->belongsTo(Tutorial::class);
    }

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function highlights(): HasMany
    {
        return $this->hasMany(TutorialStepHighlight::class);
    }

    public function getImageAttribute()
    {
        return $this->media;
    }
}
