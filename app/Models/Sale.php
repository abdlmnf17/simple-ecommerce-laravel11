<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['no_sales', 'payment_method', 'status', 'user_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_product')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
