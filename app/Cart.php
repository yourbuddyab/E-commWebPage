<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable =[
        'product_id','quantity','customer_id','customeraddress','customername','price','status',
    ];
}
