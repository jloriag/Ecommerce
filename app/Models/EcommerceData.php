<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceData extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'name',
        'webpage_banner',
        'email',
        'instagram',
        'facebook',
        'whatsapp',
        'webpage_icon'
    ]; 
}
