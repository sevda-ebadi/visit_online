<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $guarded = [];
    // relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relation to visit
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
