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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            // Customer identification
            $table->string('customer_code')->unique();

            // Customer details
            $table->string('company_name')->nullable();
            $table->string('contact_person');
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();

            // Address
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->default('Qatar');

            // Business information
            $table->string('vat_number')->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            // Additional information
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};