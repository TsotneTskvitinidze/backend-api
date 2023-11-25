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
        Schema::create('college_profession', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('college_id');
            $table->unsignedBigInteger('profession_id');
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->foreign('profession_id')->references('id')->on('professions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('college_profession');
    }
};
