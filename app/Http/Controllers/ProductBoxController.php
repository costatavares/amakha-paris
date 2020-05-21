<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Box;
use App\Models\Product;
use App\Models\BoxProduct;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Resources\ProductBoxResource;

class ProductBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idProduct)
    {
        return ProductBoxResource::collection(BoxProduct::getProductBoxes($idProduct));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idProduct)
    {
        Product::createProductBox($idProduct,$request);
        return response()->json(['message' => "Dados atualizados com sucesso"], 200);

    }

}
