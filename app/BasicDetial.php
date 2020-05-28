<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicDetial extends Model
{
    protected $fillable = [
        'name','number','email','logo','footer'
    ];
}
