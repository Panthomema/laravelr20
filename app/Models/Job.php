<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id'];
    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);    
    }
}
