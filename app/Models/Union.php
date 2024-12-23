<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;
    protected $fillable = [
        'upazila_id',
        'union_name'
    ];

    public function upazilas()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
