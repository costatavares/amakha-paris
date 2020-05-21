<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BoxProduct extends Model
{
    protected $table = 'box_product';

    protected $fillable = ['id','idProduct', 'idBox','howMuchFit'];

    static function getProductBoxes($idProduct)
    {
        $boxProduct = self::where('idProduct',$idProduct)->get(['idBox','howMuchFit']);
        if(sizeof($boxProduct) == 0)
        {
            throw new ModelNotFoundException('Caixa não encontrada');
        }
        return  $boxProduct;
    }
}
