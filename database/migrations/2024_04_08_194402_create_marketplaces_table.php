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
        Schema::create('marketplaces', function (Blueprint $table) {
            // id
            $table->id();
            // image
            $table->string('image');
            // name
            $table->string('name');
            // price
            $table->float('price',10,3)->comment('سعر الحيوان')->nullable();
            // phone
            $table->string('phone');
            // city
            $table->string('city');
            // category
            $table->enum('category', ['Animal', 'Animal Items','Animal Adoption'])->default('Animal');
            // category
            $table->enum('animal', ['Cat', 'Dog','Bird','Other'])->default('Cat');
            // comment
            $table->string('comment',1000);
            // +++++++++++++++ Foregin Key : added_by +++++++++++++++++
            $table->unsignedBigInteger('added_by')->nullable()->comment('which user was add the animal');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketplaces');
    }
};
