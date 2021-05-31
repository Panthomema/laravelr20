<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        //versión fácil, ojo que no me vale
        // return $products;
        return response()->json($products, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //sobra en API
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        //validar
        $rules = [
            'name' => 'required|max:50',
            'price' => 'required|numeric',
            'product_type_id' => 'required|exists:product_types,id',
            'description' => 'required|max:255'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);                
        }        
        //crear objeto
        $product = Product::create($request->all());
        // $product = new Product;
        // $product->.....
        // $product->save();

        //devolver el objeto creado
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //buscar
        $product = Product::find($id);
        if ($product) {
            //si se encuentra devolver 200
            return response()->json($product, 200);
        } else {
            //si no devolveremos 404
            return response()->json(['message' => "No encontrado"], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //sobra en API

    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //buscar (si no está 404)
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => "No encontrado"], 404);
        }
        //validar
        $rules = [
            'name' => 'required|max:50',
            'price' => 'required|numeric',
            'product_type_id' => 'required|exists:product_types,id',
            'description' => 'required|max:255'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);                
        }        
        //editar
        $product->fill($request->all());
        $product->save();

        //devolver el producto como ha quedado
        return response($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //buscar
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            //si se encuentra devolver 200
            return response()->json(['contenido que no llega'], 204);
        } else {
            //si no devolveremos 404
            return response()->json(['message' => "No encontrado"], 404);
        }
    }
}
