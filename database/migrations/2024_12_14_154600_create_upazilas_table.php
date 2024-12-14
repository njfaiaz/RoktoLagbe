<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('upazilas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id');
            $table->string('upazila_name');
            $table->string('bn_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('upazilas');
    }
};
