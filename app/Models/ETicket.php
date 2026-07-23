<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ETicket extends Model
{
    use HasFactory;

    protected $table = 'e_tickets';

    protected $fillable = [
        'transaksi_id',
        'ticket_code',
        'qr_code',
        'is_used',
        'used_at',
    ];

    protected $casts = [
        'is_used' => 'boolean',
        'used_at' => 'datetime',
    ];

    /**
     * E-Ticket dimiliki oleh satu transaksi
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}