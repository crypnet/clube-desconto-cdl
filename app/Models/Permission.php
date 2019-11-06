<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        "id",
        "name",
        "slug",
        "description"
        ];
}
