<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    public const PLACEHOLDER_IMAGE_PATH = 'images/profile_av.jpg';



    protected $fillable = [
        'user_id',
        'gender',
        'blood_id',
        'phone_number',
        'previous_donation_date'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function bloods()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }
}
