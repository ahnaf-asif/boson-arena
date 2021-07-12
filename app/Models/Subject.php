<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;
    public function normalProblems(): HasMany
    {
        return $this->hasMany(NormalProblem::class);
    }
    public function blogs(): HasMany{
        return $this->hasMany(Blog::class);
    }
}
