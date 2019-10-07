<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/members/' . $this->id;
    }
}
