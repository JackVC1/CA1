<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Additional fields added for records relevant to my database - these are used in TeamSeeder.php
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manager');
            $table->string('image');
            $table->text('location');
            $table->text('stadium');
            $table->integer('attendance');
            $table->integer('established');
            $table->timestamps(); //uses $currentTimestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
