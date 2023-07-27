<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tarea extends Model
{
    protected $table = "tarea";

    protected $fillable = ['_ID'];

    public function distribuidor(): BelongsTo
    {
        return $this->belongsTo(Distribuidor::Class, 'distribuidor');
    }
}
