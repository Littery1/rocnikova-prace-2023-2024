<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'events_id',
        'users_id',
        'type', 
    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'events_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
