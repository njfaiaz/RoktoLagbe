<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function districts()
    {
        return $this->belongsTo(District::class);
    }

    public function upazilas()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function unions()
    {
        return $this->belongsTo(Union::class);
    }
    public function bloods()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }
}
