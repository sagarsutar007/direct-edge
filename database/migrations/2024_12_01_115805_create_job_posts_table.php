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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->char('job_post_id', 36)->primary();
            $table->longText('slug');
            $table->string('title', 250);
            $table->longText('description');
            $table->string('reference')->nullable();
            $table->char('company_id', 36)->nullable();
            $table->string('experience', 10)->nullable();
            $table->string('cost_to_company', 25)->nullable();
            $table->string('time_period', 10)->nullable();
            $table->string('currency', 10)->nullable();
            $table->string('location', 250)->nullable();
            $table->enum('type', ['Work from Office', 'Hybrid', 'Remote'])->nullable();
            $table->integer('vacancy_count')->nullable();
            $table->date('expiry_date')->nullable();
            $table->enum('status', ['open', 'closed', 'expired']);
            $table->json('extra_configs')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
