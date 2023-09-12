<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('breafings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruiter_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('worker_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->String('message')->nullable();
            $table->String('storage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breafings');
    }
};
