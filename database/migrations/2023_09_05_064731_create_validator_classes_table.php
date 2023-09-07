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
        Schema::create('validator_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('validator_id');
            $table->string('nama_kelas');
            $table->text('deskripsi');
            $table->string('banner');
            $table->string('link_course');
            $table->timestamps();

            $table->foreign('validator_id')->references('id')->on('validators');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validator_classes');
    }
};
