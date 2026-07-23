<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTiket extends Model
{
    use HasFactory;

    protected $table = 'transaksi_tiket';

    protected $fillable = [
        'transaksi_id',
        'tiket_id',
        'qty',
        'price',
        'subtotal',
    ];

    /**
     * Detail transaksi milik satu transaksi
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    /**
     * Detail transaksi memiliki satu tiket
     */
    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}