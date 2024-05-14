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
        Schema::create('accountservices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_code');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('packageoption_id');
            $table->string('network');
            $table->string('service_type');
            $table->string('phonenumber');
            $table->string('status');
            $table->string('dob');
            $table->string('password');
            $table->string('parent');
            $table->string('dealer');
            $table->string('costcentre');

            $table->foreign('contact_code')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('packageoption_id')->references('id')->on('package_options')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accountservices');
    }
};
