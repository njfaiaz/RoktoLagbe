<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class ProfileService
{
    public function updateOrCreateProfile(array $data, int $userId, $image = null): string
    {
        return DB::transaction(function () use ($data, $userId, $image) {
            $data = array_merge([
                'user_id' => $userId,
            ], $data);

            $profile = Profile::firstOrNew(['user_id' => $userId]);

            $profile->fill($data)->save();

            // Example: sync relationships if applicable
            // $profile->interests()->sync($data['interests'] ?? []);

            // Optional image handling (if using Spatie Media Library)
            if ($image) {
                $profile->addMedia($image)->toMediaCollection('image');
            }

            return $profile->wasRecentlyCreated
                ? 'Profile created successfully!'
                : 'Profile updated successfully!';
        }, 5);
    }
}
