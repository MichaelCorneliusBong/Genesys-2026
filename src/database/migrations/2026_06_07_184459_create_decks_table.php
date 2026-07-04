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
        Schema::create('decks', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->foreignId('archetype_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('difficulty', [
            'beginner',
            'intermediate',
            'advanced',
            ])->default('beginner');

            $table->boolean('is_active')->default(true);

            $table->string('author')->nullable();

            $table->string('source')->nullable();

            $table->string('tournament_name')->nullable();

            $table->string('placement')->nullable();

            $table->date('event_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decks');
    }
};
