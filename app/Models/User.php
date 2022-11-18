<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\UserDoses;
use App\Models\Dose;

class User extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public function doses()
    {
        return $this->belongsToMany(Dose::class, 'user_doses');
    }
}