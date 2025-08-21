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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('car_registration')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('theme', ['light','dark'])->default('light');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();

            // "Names cannot repeat" — enforce unique pair.
            $table->unique(['first_name','last_name']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
