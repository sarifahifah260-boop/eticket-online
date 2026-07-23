<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class KategoriEvent extends Model
{
    use HasFactory;

    protected $table = 'kategori_events';

    protected $fillable = [
        'name',
        'description',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'kategori_event_id');
    }
}
