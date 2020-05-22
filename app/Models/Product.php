<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Product extends Model
{
    protected $fillable = ['idProduct','code', 'name'];

    /**
     * Insere um novo produto no banco de dados
     */
    static function createProduct($request)
    {
        return self::create($request->all());
    }

    /**
     * Retorna a lista de produtos previamente cadastrados
     */
    static function getProduct(){
        return self::select('code','name')->get();
    }

    /**
     *  Atualiza um produto previamente cadastrado no banco de dados
     */
    static function updateProduct($request, $id)
    {
        try {
            self::where('idProduct',$id)->first()->update($request->all());
        } catch (\Throwable $th) {
            self::ModelException('Produto não encontrado');
        }
    }

    /**
     * Atualiza um produto previamente cadastrado no banco de dados
     */
    static function createProductBox($idProduct,$request){
        try {
            $product = self::where('idProduct',$idProduct)->firstOrFail();
            $product->boxes()->sync([
                $request->idBox=>[
                    'howMuchFit'=>$request->howMuchFit,
                    'idProduct' =>$product->idProduct,
                ],
            ]);

        } catch (\Throwable $th) {
            self::ModelException('Caixa não encontrada');
        }
    }

    static function ModelException($message)
    {
        throw new ModelNotFoundException($message);
    }

    public function boxes()
    {
       return $this->belongsToMany(Box::class,'box_product','idProduct','idBox')->withPivot( 'idProduct','idBox');
    }

}
