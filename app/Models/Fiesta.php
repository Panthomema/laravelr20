<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiesta extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'description', 'max_people', 'price', 'private', 'user_id'];
    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}