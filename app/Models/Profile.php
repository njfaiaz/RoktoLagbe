<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gender',
        'blood_id',
        'phone_number',
        'previous_donation_date',
        'profile_image'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function bloods()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }
}
