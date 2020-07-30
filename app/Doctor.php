<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
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


    // relation to sections
    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    // relation to visit
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
