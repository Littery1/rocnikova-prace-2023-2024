<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'dateStart',
        'dateEnd',
        'locations_id',
        'users_id',
        'images_id',        
    ];
    protected $with = ['location', 'user', 'image'];
    
    public function location()
    {
        return $this->belongsTo(Location::class, 'locations_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function image()
    {
        return $this->hasMany(Image::class, 'events_id');
    }

    
}
