<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id','category_id','price','stock','codigo',
        'description'
    ];
    public $timestamps=false;

    public function category (){
        return $this->belongsTo('App\Category');
    }
}
