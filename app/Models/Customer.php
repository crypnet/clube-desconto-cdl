<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $attributes =[
        'status'=> false,
    ];
    protected $fillable = [
        'id',
        'fantasy_name',
        'reason_name',
        'cnpj',

    ];
    protected $casts = [
        'status'=>'boolean'
    ];
}
