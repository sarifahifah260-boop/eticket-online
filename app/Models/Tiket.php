<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'price',
        'quota',
        'remaining_quota',
        'description',
    ];

    /**
     * Relasi ke Event
     * Satu tiket dimiliki oleh satu event
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function transaksiTikets()
    {
        return $this->hasMany(TransaksiTiket::class);
    }
}