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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('kind_id');
            $table->integer('is_paralysis');
            $table->integer('number_of_answers');
            $table->string('answer')->default('A');
            $table->string('image')->nullable();
            $table->string('note');
            $table->foreign('kind_id')->references('id')->on('kinds')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
