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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
          
            $table->string('slug')->nullable();
            $table->string('pre_time')->nullable();
            $table->string('cook_time')->nullable();
            $table->string('photo')->nullable();
            $table->string('video_link')->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
          
            $table->text('short_description')->nullable();
            $table->longText('directions')->nullable();
          
            $table->string('nutrition_text')->nullable();

            $table->enum('recipe_type',['asian','indian','thai','chines'])->default('asian')->nullable();
            $table->enum('recipe_status',['pending','approved'])->default('pending')->nullable();
                
            #Relationship
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
          
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
