<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalLevel extends Model
{
    use HasFactory;
    public function users(){
        return $this->hasMany(User::class);
    }
    public function participantCategory(){
        return $this->belongsTo(ParticipantCategory::class);
    }
}
