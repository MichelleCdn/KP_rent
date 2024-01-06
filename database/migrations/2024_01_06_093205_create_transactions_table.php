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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('asset_id');
            $table->foreignId('quantity');
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->string('payment_method');
            $table->string('warranty_type'); // KTP / SIM
            $table->string('status')->default('dipesan'); // ['dipesan', 'sedang disewakan', 'telah dikembalikan']
            $table->foreignId('shipping_fee');
            $table->foreignId('total_price');
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
