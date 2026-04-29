<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
