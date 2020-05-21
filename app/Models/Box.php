<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = ['idBox', 'name'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'box_product','idBox','idProduct')->withPivot( 'idBox','idProduct');
    }
}
