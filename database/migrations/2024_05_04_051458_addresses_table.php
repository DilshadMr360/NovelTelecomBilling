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
        Schema::create('addresses', function (Blueprint $table) {
            // Define id as the primary key, which auto-increments and is unique
            $table->id()->unique();

            // Define foreign key reference to account table
            $table->foreignId('contact_code')->onDelete('cascade');

            // Other columns
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('post_code')->nullable();
            $table->string('suburb')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('address_type')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
