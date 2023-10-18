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
        Schema::create('collage_teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collage_id');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('collage_id')->references('id')->on('collages');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collage_teacher');
    }
};
