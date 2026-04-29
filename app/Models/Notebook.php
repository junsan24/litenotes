<?php

namespace App\Models;

use App\Models\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notebook extends Model
{
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}
