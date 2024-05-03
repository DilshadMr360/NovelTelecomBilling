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
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('contact_code')->nullable();
            $table->enum('type', ['corporate', 'individual'])->default('individual');
            $table->string('key')->nullable();
            $table->string('business_name')->nullable();
            $table->string('name')->nullable();
            $table->string('trading_name')->nullable();
            $table->string('ACN')->nullable();
            $table->string('ABN')->nullable();
            $table->string('email')->nullable();
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email_billing')->nullable();
            $table->string('title')->nullable();
            $table->string('initilas')->nullable();
            $table->string('primary_trading_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('salutation')->nullable();
            $table->string('employee_no')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('primary_question')->nullable();
            $table->string('primary_answer')->nullable();
            $table->string('identification')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
