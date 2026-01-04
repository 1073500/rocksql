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
        Schema::create('rocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('name');
            $table->foreignId('type_id')->constrained();
            $table->foreignId('color_id')->constrained();
            $table->foreignId('hardness_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('continent_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rocks');
    }
};
