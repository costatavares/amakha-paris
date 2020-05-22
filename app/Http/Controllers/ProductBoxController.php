<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\BoxProduct;
use App\Http\Requests\ProductBox\ProductBoxFormRequest as ProductBoxRequest;

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
     * Quantidade de produtos por caixa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductBoxRequest $request,$idProduct)
    {
        Product::createProductBox($idProduct,$request);
        return response()->json(['message' => "Dados atualizados com sucesso"], 200);
    }

}
