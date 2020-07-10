<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    public $table = 'permissions';

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
