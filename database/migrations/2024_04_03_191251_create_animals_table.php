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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            // profile image
            $table->string('image');
            // animal pictures
            // $table->string('animal_pictures');
            // geographic_distribution image
            $table->string('geographic_distribution_image');
            $table->string('name');
            // +++++++++++++++ Foregin Key : category_id +++++++++++++++++
            $table->unsignedBigInteger('category_id')->nullable()->comment('category which animal belongs to');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('introduce_animal',1000);
            $table->string('animal_characteristics',1000);
            $table->string('dietary_preference',1000);
            $table->string('care_requirements',1000);
            $table->string('health_recommendations',1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
