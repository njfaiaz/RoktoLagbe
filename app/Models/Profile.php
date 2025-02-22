<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $_guarded = ['id'];
    protected $fillable = [
        'user_id', 'gender', 'blood_id', 'phone_number', 'previous_donation_date'
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
