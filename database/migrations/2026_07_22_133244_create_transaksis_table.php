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
        Schema::create('transaksis', function (Blueprint $table) {

            $table->id();

            $table->string('invoice_number')->unique();

            $table->string('customer_name');

            $table->string('customer_email');

            $table->string('customer_phone');

            $table->decimal('total_price',12,2)->default(0);

            $table->enum('payment_status',[
                'Pending',
                'Paid',
                'Cancelled'
            ])->default('Pending');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};