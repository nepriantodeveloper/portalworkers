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
        Schema::create('recruiters', function (Blueprint $table) {
            $table->id();
            $table->string('username',50)->nullable();
            $table->string('password',100);
            $table->string('name',100)->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_person',50)->nullable();
            $table->string('no_telp',50)->nullable();
            $table->string('email',50)->unique();
            $table->string('npwp_perusahaan',50)->nullable();
            $table->string('no_nib',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiters');
    }
};
