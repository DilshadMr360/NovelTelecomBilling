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
        Schema::create('accounts', function (Blueprint $table) {
            // Define contact_code as big integer that auto-increments and is the primary key
            $table->id();

            // Other columns
            $table->string('contact_code');
            $table->string('typeSelect');
            $table->string('key')->nullable();
            $table->string('title')->nullable();
            $table->string('business_unit')->nullable();
            $table->string('name')->nullable();
            $table->string('trading_name')->nullable();
            $table->string('acn')->nullable();
            $table->string('abn')->nullable();
            $table->string('email')->nullable();
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('initials')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('salutation')->nullable();
            $table->string('employee_no')->nullable();
            $table->string('email_billing')->nullable();
            $table->string('primary_trading_name')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('question_2')->nullable();
            $table->string('answer_2')->nullable();
            $table->string('identification')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
