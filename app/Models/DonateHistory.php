<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blood_receiver_name',
        'blood_receiver_number',
        'blood_id',
        'gender',
        'district_id',
        'upazila_id',
        'union_id',
        'patient_details',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloods()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }
}
