<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class icum extends Model
{
    protected $table = 'icum';
    protected $primaryKey = 'umid';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable =[
        'umid',
        'umname',
        'umname2',
        'factor',
        'note',
        'active',
        'useradd',
        'create_add',
        'date_edit'
    ];
}
