<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id',
        'fantasy_name',
        'reason_name',
        'cnpj',
        'status'

    ];
}
