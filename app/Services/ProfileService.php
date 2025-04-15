<?php

namespace App\Services;


use App\Models\Profile;

class ProfileService
{
    public function updateOrCreateProfile(array $data, int $userId): string
    {
        $profile = Profile::where('user_id', $userId)->first();

        if ($profile) {
            $profile->update($data);
            return 'Profile updated successfully!';
        } else {
            $data['user_id'] = $userId;
            Profile::create($data);
            return 'Profile created successfully!';
        }
    }
}
