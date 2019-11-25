<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password',
    ];

}
