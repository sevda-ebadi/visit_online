<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;
    //
    protected $guarded = [];

    // relation to clinic
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    // relation to doctors
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    // relation to employee
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
