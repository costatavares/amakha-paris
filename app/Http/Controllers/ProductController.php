<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Produtos cadastrados
     *
     * Retorna a lista de produtos previamente cadastrados
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
     * Insere um novo produto no banco de dados
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = new ProductResource(Product::createProduct($request));
        return response()->json(['id' => $response->id], 201);
    }


    /**
     * Atualiza produto
     *
     * Atualiza um produto previamente cadastrado no banco de dados
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $product = $this->product->where(['idProduct'=>$id]);
        // $product->update($request->only(['name']));
        Product::updateProduct($request, $id);
        return response()->json(['message' => "Produto atualizado com sucesso"], 200);
    }

}
