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
        Schema::create('nutritions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('calories', 255);
            $table->string('total_fat', 255);
            $table->string('protein', 255);
            $table->string('carbohydrates', 255);
            $table->string('cholesterol', 255);

            $table->unsignedBigInteger('recipe_id')->nullable();
            //$table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutritions');
    }
};
