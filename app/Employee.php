<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    //
    protected $guarded = [];
    use SoftDeletes;

    // relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relation to salary
    public function salaries()
    {
        return $this->morphMany(Salary::class, 'have_salary');
    }

    // relation to section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
