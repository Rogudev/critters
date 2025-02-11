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
        Schema::create('critters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->string('type_1');
            $table->string('type_2')->nullable();
            $table->string('type_3')->nullable();
            $table->text('description');
            $table->string('habitat');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('encounter_difficulty', ['common', 'rare', 'ultra rare', 'legendary']);
            $table->string('sound');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('critters');
    }
};
