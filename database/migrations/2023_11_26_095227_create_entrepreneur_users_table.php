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
        Schema::create('entrepreneur_users', function (Blueprint $table) {
            $table->id();
            $table->string('ownerName');
            $table->string('shopName');
            $table->string('location');
            $table->string('category');
            $table->tinyInteger('entrepreneur_status');
            $table->string('businessReNo')->unique();
            $table->integer('phoneNo');
            $table->string('picture')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrepreneur_users');
    }
};
