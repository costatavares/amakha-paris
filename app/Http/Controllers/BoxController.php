<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Box\BoxFormRequest as BoxRequest;

use App\Models\Box;
use App\Http\Resources\BoxResource;

class BoxController extends Controller
{
    /**
     * Caixas cadastradas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BoxResource::collection(Box::getBox());
    }

    /**
     * Adiciona caixa
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoxRequest $request)
    {
        $response = new BoxResource(Box::createBox($request));
        return response()->json(['id' => $response->id], 201);
    }


    /**
     * Atualiza caixa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoxRequest $request, $id)
    {
        Box::updateBox($request, $id);
        return response()->json(['message' => "Produto atualizado com sucesso"], 200);
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
