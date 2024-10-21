<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'photo',
        'photo_2',
        'photo_3',
        'photo_4',
    ];
    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_product')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
