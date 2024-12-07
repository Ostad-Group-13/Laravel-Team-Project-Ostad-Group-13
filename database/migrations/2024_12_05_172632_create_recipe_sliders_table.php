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
        Schema::create('recipe_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('img')->nullable();

            //$table->unsignedBigInteger('recipe_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            //$table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_sliders');
    }
};
