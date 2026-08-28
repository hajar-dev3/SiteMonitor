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
        Schema::create('statistique_uptimes', function (Blueprint $table) {
    $table->id();

    $table->foreignId('site_id')
          ->constrained('sites')
          ->cascadeOnDelete();

    $table->date('date');

    $table->float('uptime_percent')->default(0);

    $table->integer('total_checks')->default(0);
    $table->integer('up_checks')->default(0);
    $table->integer('down_checks')->default(0);

    $table->timestamps();

    $table->unique(['site_id', 'date']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistique_uptimes');
    }
};
