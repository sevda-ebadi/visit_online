<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Clinic extends Model
{
    use SoftDeletes;
    //
    protected $guarded = [];

    // relation to section
    public function sections()
    {
        return $this->hasMany(Section::class);
    }


}
