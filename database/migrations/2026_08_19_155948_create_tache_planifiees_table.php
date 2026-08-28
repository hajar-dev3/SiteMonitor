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
        Schema::create('tache_planifiees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('site_id')
                  ->constrained('sites')
                  ->cascadeOnDelete();

            $table->foreignId('verification_id')
                  ->constrained('verifications')
                  ->cascadeOnDelete();

            $table->string('name');
            $table->string('expression');

            $table->dateTime('last_run_at')->nullable();
            $table->dateTime('next_run_at')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tache_planifiees');
    }
};