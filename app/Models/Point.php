<?php

namespace App\Models;

use App\Scopes\PointScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PointScope());
    }
}
