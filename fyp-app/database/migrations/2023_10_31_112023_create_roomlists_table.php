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
        Schema::create('roomlists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['Apartment', 'House', 'Condo', 'Villa', 'Other']);
            $table->decimal('price', 10, 2); // Assuming a price field with 2 decimal places.
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('area_sqft');
            $table->string('location');
            $table->boolean('is_available')->default(true); // Indicates if the room is available.
            $table->string('image_path')->nullable(); // Field for the image file path.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roomlists');
    }
};
