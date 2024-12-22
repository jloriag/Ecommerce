<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model {

    use HasFactory;
    
    protected $fillable = [
        'paid_method',
        'state'
    ];

    public function produts() {
        return $this->hasMany(Product::class, 'id');
    }
}
