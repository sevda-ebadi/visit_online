<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    protected $guarded = [];

    // relation to visit
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
