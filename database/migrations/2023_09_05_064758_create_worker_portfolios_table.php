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
        Schema::create('worker_portfolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('validator_id');
            $table->string('nama_project');
            $table->text('deskripsi');
            $table->string('link_repository');
            $table->string('link_demo_video');
            $table->string('link_demo_live');
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
        Schema::dropIfExists('worker_portfolios');
    }
};
