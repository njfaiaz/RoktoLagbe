<?php

use App\Models\Address;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignIdFor(Address::class);
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('blood_group')->nullable();
            $table->string('phone_number')->nullable()->unique();
            $table->string('previous_donation_time')->nullable();
            $table->string('all_donation_time')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
