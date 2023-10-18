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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profil')->nullable();
            $table->string('nama');
            $table->string('npm')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('jurusan')->nullable();
            $table->string('jenis_kelamin');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['super admin','admin','user'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
