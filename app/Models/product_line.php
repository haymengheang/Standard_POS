<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_line extends Model
{
    protected $table = "product_line";
    protected $primaryKey = "productlineid";
    public $incrementing = false;  
    protected $keyType = 'string';  
    protected $fillable =[
        'productlineid',
        'productlinename',
        'productlinename2',
        'noted',
        'disc',
        'disc_percentage',
        'picture',
        'active',
        'useradd',
        'useredit'
    ]; 
}
