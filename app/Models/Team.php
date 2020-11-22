<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{

    public function getUsersCountAttribute()
    {
        return DB::table('users')
            ->where('users.team_id', $this->id)
            ->count('users.id');
    }

    public $appends = ['users_count'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }
}
