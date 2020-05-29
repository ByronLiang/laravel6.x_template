<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

abstract class Model extends BaseModel
{
    protected $guarded = ['id'];

    protected $dateFormat = 'U';

    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];
}
