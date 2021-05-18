<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable = ['id', 'name'];
=======
>>>>>>> 57a61728498ed607d25a0fcbf765b0a36e0d9f96

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
