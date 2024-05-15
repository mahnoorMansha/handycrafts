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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('SKU');
            $table->string('name');
            $table->string('description');
            $table->foreignId('category_id')->constrained();
            $table->string('category');
            $table->integer('quantity');
            $table->float('price');
            $table->enum('size', array('S', 'M','L'));
            $table->string('color');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
