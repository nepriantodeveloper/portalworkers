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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->string('nama_project');
            $table->text('deskripsi');
            $table->string('skill_requirement');
            $table->decimal('budget',12,2);
            $table->string('link_flowchart');
            $table->string('link_file_pendkung');
            $table->string('link_database_model');
            $table->string('link_referensi_website');
            $table->string('link_referensi_apps');
            $table->enum('status_project', ['N', 'Y'])->default('N');
            $table->timestamps();


            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
