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
        Schema::create('reqruiters', function (Blueprint $table) {
            $table->id();
            $table->string('username',50);
            $table->string('password',100);
            $table->string('reqruiter_name',100);
            $table->text('deskripsi');
            $table->text('alamat');
            $table->string('contact_person',50);
            $table->string('no_telp',50);
            $table->string('email',50);
            $table->string('npwp_perusahaan',50);
            $table->string('no_nib',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reqruiters');
    }
};
