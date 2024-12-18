<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public static function generateUniqueUsername($name)
    {
        $baseUsername = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $name));
        // Base username: convert name to a URL-friendly slug
        $baseUsername = Str::slug($name);
        $username = $baseUsername;
        $counter = 1;

        // Check if the username already exists and append a counter if necessary
        while (self::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
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
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function blood()
    {
        return $this->hasOne(Blood::class);
    }

    // User.php
    protected static function booted()
    {
        static::created(function ($user) {
            $user->profile()->create([
                'blood_id' => null,
                'address_id' => null,
                'gender' => 'Not specified',
                'last_date' => now(),
            ]);
        });
    }
}
