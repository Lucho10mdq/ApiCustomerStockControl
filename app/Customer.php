<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $fillable=[
       'id','name','lastname','address','phone',
       'email','dni','nro_customer'
   ];
   public $timestamps=false;
}
