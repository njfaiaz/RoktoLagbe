<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakeUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'fake_user_name',
        'fake_user_phone_number',
        'fake_user_details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
