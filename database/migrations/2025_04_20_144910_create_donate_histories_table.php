<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donate_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('blood_receiver_name')->nullable();
            $table->string('blood_receiver_number')->nullable();
            $table->foreignId('blood_id')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('upazila_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('union_id')->nullable()->constrained()->nullOnDelete();
            $table->text('patient_details')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donate_histories');
    }
};
