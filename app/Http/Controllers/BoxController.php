<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BoxResource;
use App\Models\Box;


class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BoxResource::collection(Box::select('idBox as id','name')->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idBox)
    {
        $box = Box::where(['idBox'=>$idBox]);
        $box->update($request->only(['name']));
        return response()->json(['message' => "Caixa atualizado com sucesso"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
