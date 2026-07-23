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
        Schema::create('transaksi_tiket', function (Blueprint $table) {

            $table->id();

            $table->foreignId('transaksi_id')
                ->constrained('transaksis')
                ->cascadeOnDelete();

            $table->foreignId('tiket_id')
                ->constrained('tikets')
                ->cascadeOnDelete();

            $table->unsignedInteger('qty');

            $table->decimal('price',12,2);

            $table->decimal('subtotal',12,2);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_tiket');
    }
};