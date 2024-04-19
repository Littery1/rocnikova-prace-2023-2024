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
        'users_id'        
    ];
    protected $with = ['location', 'user'];
    
        public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id'); // Specify the foreign key name
    }
}
