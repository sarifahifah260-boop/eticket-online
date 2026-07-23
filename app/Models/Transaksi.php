<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'total_price',
        'payment_status',
    ];

    /**
     * Satu transaksi memiliki banyak detail tiket
     */
    public function transaksiTikets()
    {
        return $this->hasMany(TransaksiTiket::class);
    }
    /**
     * Satu transaksi memiliki satu E-Ticket
     */
    public function eTicket()
    {
        return $this->hasOne(ETicket::class);
    }
}
