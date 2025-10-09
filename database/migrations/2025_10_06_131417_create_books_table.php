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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('title', '191')->unique();
            $table->unsignedInteger('year_of_publication');
            $table->string('genre', '64');
            $table->string('status', '1');
            $table->softDeletes(); // soft delete - zapis se ne briše fizički iz baze
            $table->foreign('author_id')->references('id')->on('authors')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
