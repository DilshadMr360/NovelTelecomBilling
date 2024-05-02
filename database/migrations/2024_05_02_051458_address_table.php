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
        Schema::create('address', function (Blueprint $table) {
        $table->id();
        $table->string('address1')->nullable();
        $table->string('address2')->nullable();
        $table->string('postcode')->nullable();
        $table->string('suburb')->nullable();
        $table->string('state')->nullable();
        $table->string('country')->nullable();
        $table->string('address_type')->nullable();
        $table->timestamps();

    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
