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
        Schema::create('usage_details', function (Blueprint $table) {
            $table->id();
            $table->string('cost_centre');
            $table->string('service_number');
            $table->string('service_narrative')->nullable();
            $table->string('service_type');
            $table->date('date');
            $table->time('time');
            $table->string('number_called');
            $table->time('quantity');
            $table->string('quantity_type');
            $table->string('rate_period');
            $table->decimal('non_discounted_price_(ex_tax)');
            $table->decimal('discounted_price_(ex_tax)');
            $table->string('tax_free');
            $table->string('usage_type');
            $table->string('usage_description');
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
        Schema::dropIfExists('usage_details');
    }
};
