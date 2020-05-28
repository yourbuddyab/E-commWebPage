<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produect extends Model
{
    protected $fillable = [
        'name','number','quantity','price','description','pic1','pic2','pic3','pic4',    
    ];
}
