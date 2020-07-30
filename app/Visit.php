<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //
    protected $guarded = [];

    // relation to doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // relation to patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // relation to medicine
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
