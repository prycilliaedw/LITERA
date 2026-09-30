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
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('url');
            $table->string('title');
            $table->string('source');
            $table->string('content_type');
            $table->timestamp('analyzed_at');
            $table->unsignedTinyInteger('fact_confidence');
            $table->string('fact_status');
            $table->text('main_claim');
            $table->string('intent');
            $table->text('age_recommendation');
            $table->json('language_indicators');
            $table->text('explanation');
            $table->text('recommendation');
            $table->boolean('is_demo')->default(false);
            $table->timestamps();
            $table->index(['user_id', 'is_demo', 'analyzed_at']);
            $table->unique(['user_id', 'url']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
