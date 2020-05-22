<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BoxProduct extends Model
{
    protected $table = 'box_product';

    protected $fillable = ['id','idProduct', 'idBox','howMuchFit'];

    /**
     * Retorna a lista de caixas para esse produto contendo a quantidade de produtos que cabem em cada caixa
     */
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
