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
        Schema::create('producers', function (Blueprint $table) {
            $table->ulid('id')->primary()->uniqid();
            $table->ulid('user_id');
            $table->integer('total_revenue')->default('0');
            $table->integer('total_sales')->default('0');
            $table->integer('total_beats')->default('0');
            $table->integer('profile_views')->default('0');
            $table->integer('total_beats_sold')->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producers');
    }
};
