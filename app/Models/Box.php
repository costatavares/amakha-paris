<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Box extends Model
{
    protected $table = 'boxes';
    protected $fillable = ['name'];
    protected $primarykey = 'idBox';

    /**
     * Insere uma nova caixa no banco de dados
     */
    static function createBox($request)
    {
        return self::create($request->all());
    }

    /**
     * Retorna a lista de caixas cadastradas no sistema
     */
    static function getBox(){
        return self::select('idBox as id','name')->get();
    }

    /**
     * Atualiza uma caixa previamente cadastrada no banco de dados
     */
    static function updateBox($request, $id)
    {
        try {
            self::where(['idBox'=>$id])->firstOrFail()->where(['idBox'=>$id])->update($request->only(['name']));
        } catch (\Throwable $th) {
            //dd($th);
            self::ModelException('Caixa não encontrada');
        }
    }

    static function ModelException($message)
    {
        throw new ModelNotFoundException($message);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'box_product','idBox','idProduct')->withPivot( 'idBox','idProduct');
    }
}
