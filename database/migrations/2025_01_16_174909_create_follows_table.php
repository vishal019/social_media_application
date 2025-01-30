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
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('follower_id'); // The user who is following
            $table->unsignedBigInteger('following_id')->default('0'); // The user being followed
            $table->string('follower_name');
            $table->string('following_name');
            $table->string('followorunfollow')->default('follow');
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('following_id')->references('id')->on('users')->onDelete('cascade');
        
            $table->unique(['follower_id', 'following_id']); // Prevent duplicate follows
            
            $table->timestamps();

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
