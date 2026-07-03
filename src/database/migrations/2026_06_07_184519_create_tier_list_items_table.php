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
        Schema::create('tier_list_items', function (Blueprint $table) {

            $table->id();

            $table->foreignId('tier_list_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('archetype_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('tier', [

                'S',
                'A',
                'B',
                'C',

            ]);

            $table->unsignedInteger('position')
                ->default(1);

            $table->timestamps();

            $table->unique([
                'tier_list_id',
                'archetype_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tier_list_items');
    }
};