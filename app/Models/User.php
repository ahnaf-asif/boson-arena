<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'institution',
        'phone',
        'password',
        'educational_level_id',
        'address',
        'social_media_link',
        'profile_picture_link',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function educationalLevel(): BelongsTo
    {
        return $this->belongsTo(EducationalLevel::class);
    }
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
    public function normalProblems(): HasMany
    {
        return $this->hasMany(NormalProblem::class)->orderBy('id', 'desc');
    }
    public function normalSubmissions(): HasMany{
        return $this->hasMany(NormalSubmission::class)->orderBy('id', 'desc');
    }
    public function blogs(): HasMany{
        return $this->hasMany(Blog::class)->orderBy('id', 'desc');
    }
    public function contacts():HasMany{
        return $this->hasMany(Contact::class)->orderBy('id', 'desc');
    }
    public function articles():HasMany{
        return $this->hasMany(Article::class)->orderBy('id', 'desc');
    }
}
