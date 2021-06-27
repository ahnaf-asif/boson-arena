<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EducationalLevel extends Model
{
    use HasFactory;
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function participantCategory(): BelongsTo
    {
        return $this->belongsTo(ParticipantCategory::class);
    }
}
