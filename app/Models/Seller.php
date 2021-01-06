<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope('age', function (Builder $builder) {
            $builder->where('type', '=', 'seller');
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
