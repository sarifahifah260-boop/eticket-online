<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriEvent;
use App\Models\Tiket;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_event_id',
        'title',
        'description',
        'location',
        'start_at',
        'end_at',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function kategoriEvent()
    {
        return $this->belongsTo(KategoriEvent::class, 'kategori_event_id');
    }

    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
