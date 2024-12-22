<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'state_id',
        'brand',
        'amount',
        'sku'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
