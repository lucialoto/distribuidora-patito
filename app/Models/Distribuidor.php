<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Distribuidor extends Model
{
    protected $table = "distribuidor";

    protected $fillable = ['_ID','login'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::Class, 'user');
    }
}
