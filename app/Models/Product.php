<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'name',
        'description',
        'price',
        'striked_price',
        'image'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
