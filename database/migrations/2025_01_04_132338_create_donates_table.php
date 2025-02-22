<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->nullable();
            $table->foreignId('upazila_id')->nullable();
            $table->foreignId('union_id')->nullable();
            $table->string('donate_name');
            $table->string('donate_description');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('donates');
    }
};
