<?php

use App\Models\Workers;
use App\Models\Reqruiters;
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
            $table->enum('transaction_type', ['Job', 'Recruitment'])->default('Recruitment');
            $table->enum('status_validasi', ['N', 'Y'])->default('N');
            $table->enum('status_project', ['N', 'Y'])->default('N');
            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('recruiter_id');
            $table->timestamps();

            $table->foreign('worker_id')->references('id')->on('workers');
            $table->foreign('recruiter_id')->references('id')->on('recruiters');
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
