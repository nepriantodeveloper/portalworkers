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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('username',50)->nullable();
            $table->string('password');
            $table->string('name',50);
            $table->string('email',100)->unique();
            $table->string('ktp',16)->nullable();
            $table->string('nama_bank',100)->nullable();
            $table->string('rekening_bank',16)->nullable();
            $table->string('npwp',30)->nullable();
            $table->text('alamat')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('foto')->nullable();
            $table->integer('lvl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
