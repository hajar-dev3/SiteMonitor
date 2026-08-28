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
        Schema::create('verifications', function (Blueprint $table) {
    $table->id();

    $table->foreignId('site_id')
          ->constrained('sites')
          ->cascadeOnDelete();

    $table->string('status');
    $table->float('response_time')->nullable();
    $table->integer('http_code')->nullable();
    $table->dateTime('checked_at');
    $table->text('error_message')->nullable();

    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
