<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_users',
        'full_name',
        'no_phone',
        'date_of_birth',
        'place_of_birth',
        'address',
        'profile_picture',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id',
        'id_users',
    ];
}
