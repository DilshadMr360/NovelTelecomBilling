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
        Schema::create('package_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packageoption_id');
            $table->string('rate');
            $table->string('rate_name');
            $table->string('rate_type');
            $table->timestamps();
            $table->foreign('packageoption_id')->references('id')->on('package_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_rates');
    }
};
