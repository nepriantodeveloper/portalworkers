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
        Schema::create('worker_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('validator_id');
            $table->string('nama_kursus');
            $table->string('penyelenggara');
            $table->text('deskripsi');
            $table->enum('status_validasi', ['N', 'Y'])->default('N');
            $table->timestamps();
            $table->foreign('worker_id')->references('id')->on('workers');
            $table->foreign('validator_id')->references('id')->on('validators');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_courses');
    }
};
