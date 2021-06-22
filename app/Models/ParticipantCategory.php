<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantCategory extends Model
{
    use HasFactory;
    public function educationalLevels(){
        return $this->hasMany(EducationalLevel::class);
    }
}
