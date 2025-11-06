<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TutorialStepHighlight extends Model
{
    use HasFactory;
    protected $fillable = [
        'tutorial_step_id',
        'x',
        'y',
        'width',
        'height',
        'data',
    ];

    protected $casts = [
        'x' => 'decimal:2',
        'y' => 'decimal:2',
        'width' => 'decimal:2',
        'height' => 'decimal:2',
        'data' => 'array',
    ];

    public function tutorialStep(): BelongsTo
    {
        return $this->belongsTo(TutorialStep::class);
    }
}
