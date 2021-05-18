<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('guest'); Sólo para invitados
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ProductType::all();
        return view('product.create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación
        $rules = [
            'name' => 'required|string|unique:products|max:50',
            'price' => 'required|double',
        ];

        $this->validate($request, $rules);

        Product::create($request->all());

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $types = ProductType::all();
        return view('product.edit', ['product' => $product, 'types' => $types]);
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
        //Búsqueda
        $product = Product::find($id);

        //Validación
        $rules = [
            'name' => 'required|string|max:50|unique:products,name,' . $id,
            'price' => 'required|numeric',
        ];

        $this->validate($request, $rules);

        //Paso de datos
        $product->name = $request->name;
        $product->price = $request->price;
        $product->product_type_id = $request->product_type_id;
        $product->description = $request->description;
        
        //Inserción
        $product->save();

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $product = Product::find($id);
        Product::destroy([$id]);

        return back();
    }
}
