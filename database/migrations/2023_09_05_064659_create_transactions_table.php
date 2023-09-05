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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('worker_id',11);
            $table->integer('recruiter_id',11);
            $table->integer('transaction_type',11);
            $table->enum('status_validasi',['N','Y'])->index();
            $table->enum('status_project',['N','Y'])->index();
            $table->foreign('workers')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recruiter')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
