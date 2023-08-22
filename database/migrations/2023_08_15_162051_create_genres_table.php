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
        Schema::create('genres', function (Blueprint $table) {
            $table->ulid('id')->primary()->uniqid();
            $table->string('name');
            $table->integer('total_plays')->default(0);
            $table->integer('total_downloads')->default(0);
            $table->integer('total_uploads')->default(0);
            $table->integer('number_of_beats')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
