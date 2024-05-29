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
        Schema::create('usage_summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_code');
            $table->string('phonenumber');
            $table->string('service_narrative');
            $table->string('service_types');
            $table->string('cost_center');
            $table->string('mobilecalls_tax');
            $table->string('nationalcalls_tax');
            $table->string('othercalls_tax');
            $table->string('localcalls_tax');
            $table->string('incomingcalls_tax');
            $table->string('discount_tax');
            $table->string('total_tax');
            $table->timestamps();

            $table->foreign('contact_code')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usage_summaries');
    }
};
