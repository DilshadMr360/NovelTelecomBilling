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
        Schema::create('charges_summary', function (Blueprint $table) {
            $table->id();
            $table->string('cost_centre');
            $table->string('service_number');
            $table->string('service_narrative')->nullable();
            $table->string('service_type');
            $table->string('charge_group');
            $table->string('charge_description');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->decimal('charge_amount');
            $table->unsignedBigInteger('contact_code');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('contact_code')->references('id')->on('account_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charges_summary');
    }
};
