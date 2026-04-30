<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notebook;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    public $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function notebook(): BelongsTo
    {
        return $this->belongsTo(Notebook::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
