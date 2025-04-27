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
        'donation_date',
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

    public function blood()
    {
        return $this->belongsTo(Blood::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id', 'id');
    }

    public function union()
    {
        return $this->belongsTo(Union::class, 'union_id', 'id');
    }
}
