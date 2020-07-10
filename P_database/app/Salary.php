<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    protected $guarded = [];

    public function have_salary()
    {
        return $this->morphTo();
    }
}
