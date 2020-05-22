<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductFormRequest as ProductRequest;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Produtos cadastrados
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::getProduct());
    }

    /**
     * Adiciona produto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $response = new ProductResource(Product::createProduct($request));
        return response()->json(['id' => $response->id], 201);
    }

    /**
     * Atualiza produto
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        Product::updateProduct($request, $id);
        return response()->json(['message' => "Produto atualizado com sucesso"], 200);
    }

}
