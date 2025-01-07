<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'district_id', 'upazila_id', 'union_id'];
    public function users()
    {
        return $this->belongsTo(User::class);
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
    public function bloods()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }
}
