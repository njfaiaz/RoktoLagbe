<?php

namespace App\Models;

use Faker\Core\Blood;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function bloods()
    {
        return $this->belongsTo(Blood::class);
    }
}
