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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->char('feedback_id', 36)->primary(); // Use char(36) for UUID in MariaDB
            $table->string('name');
            $table->string('designation');
            $table->string('company');
            $table->string('profile_img');
            $table->text('description')->nullable();
            $table->enum('rating', ['1', '2', '3', '4', '5'])->nullable();
            $table->enum('approved', ['0', '1'])->default('0'); // Corrected "aprroved" to "approved"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
