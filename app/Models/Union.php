<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
