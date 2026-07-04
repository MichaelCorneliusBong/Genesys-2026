<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_histories', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('quiz_type');

            $table->unsignedInteger('score');

            $table->unsignedInteger('total_question');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_histories');
    }
};