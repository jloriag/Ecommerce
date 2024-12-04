<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellProducts extends Model {

    protected $fillable = ['product_id', 'sell_id'];

    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function sell() {
        return $this->belongsTo(Sell::class);
    }
}
