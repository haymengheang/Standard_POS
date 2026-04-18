<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icproduct extends Model
{
    protected $table = 'icproduct';

    protected $primaryKey = 'productid';   // ⭐ VERY IMPORTANT

    public $incrementing = false;          // because not auto-increment

    protected $keyType = 'string';         // because productid is string

    protected $fillable = [
        'productid',
        'productname',
        'productname2',
        'unit_of_measure',
        'image',
        'product_line',
        'price',
        'other_price',
        'action'
    ];
}