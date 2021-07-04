<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NormalProblem extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'name',
        'archive',
        'description_en',
        'description_bn',
        'judging_method',
        'identifier',
        'user_id'
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
    public function solutions(): HasMany
    {
        return $this->hasMany(Solution::class);
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function normalSubmissions(): HasMany{
        return $this->hasMany(NormalSubmission::class);
    }
}
