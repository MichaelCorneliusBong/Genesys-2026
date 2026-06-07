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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();

             $table->unsignedBigInteger('ygoprodeck_id')
                ->unique();

            $table->string('name');

            $table->string('slug')
                ->nullable();

            $table->string('image_url')
                ->nullable();

            $table->string('local_image')
                ->nullable();

            $table->string('type')
                ->nullable();

            $table->string('attribute')
                ->nullable();

            $table->json('raw_data')
                ->nullable();

            $table->timestamp('last_synced_at')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
