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
        Schema::create('session_examens', function (Blueprint $table) {
            $table->id();
            $table->string('intitule')->nullable;
            $table->string('promotion')->nullable;
            $table->string('mention')->nullable;
            $table->string('semestre')->nullable;
            $table->string('an_academique')->nullable;
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_examens');
    }
};
