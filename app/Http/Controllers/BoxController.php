<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BoxResource;
use App\Models\Box;


class BoxController extends Controller
{
    /**
     * Caixas cadastradas
     *
     * Retorna a lista de caixas cadastradas no sistema
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BoxResource::collection(Box::select('idBox as id','name')->paginate(25));
    }

    /**
     * Adiciona caixa
     *
     * Insere uma nova caixa no banco de dados
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Box::create($request->all());
        $response = new BoxResource($book);
        return response()->json(['id' => $response->id], 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $box = Box::where(['idBox'=>$id]);
        $box->update($request->only(['name']));
        return response()->json(['message' => "Caixa atualizado com sucesso"], 200);
    }


    /**
     * Lista de caixas para pedido
     *
     * Lista de caixas necessárias para enviar todos os produtos do pedido
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function boxesForOrder(Request $request)
    {

    }

}
