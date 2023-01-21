<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    protected $table = 'motorcycle';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_users',
        'name',
        'ut_code',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id',
        'id_users'
    ];
}
