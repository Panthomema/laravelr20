<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('guest');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('producttype')->get();
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
        $rules = [
            'name' => 'required|string|unique:products,name|max:50'
        ];
        $this->validate($request, $rules);

        //metodo 1 más rudimentario:
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_type_id = $request->product_type_id;
        // $product->fill($request->all());
        $product->save();

        // //metodo 2 más rápido. Requiere $fillable en el modelo
        // $product = ProductType::create($request->all());

        return redirect('/products');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        session(['lastProduct' => $product]);
        
        //historial...............................................
        //lista de productos visitados en orden: 'historial'
        if (Session::has('historial')) {
            $historial = Session::get('historial');
        } else {
            $historial = array();
        }
        $historial[] = $product;
        Session::put('historial', $historial);
        //FIN historial...............................................
        
        //historial CON CONTADOR ......................................
        //lista de productos visitados en orden: 'historial'
        if (Session::has('historial2')) {
            $historial2 = Session::get('historial2');
        } else {
            $historial2 = array();
        }

        if (isset($historial2[$product->id])) {
            $historial2[$product->id]->contador++;
        } else {
            $product->contador=1;
            $historial2[$product->id] = $product;
        }

        // $product->contador = 1;
        // $product->contador++;
        // $historial2[] = $product;
        Session::put('historial2', $historial2);
        //FIN historial CON CONTADOR...............................................


        // Session::put('lastProduct', $product);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function forgetLastProduct()
    {
        // Session::flush();
        Session::forget('lastProduct');
        return back();
    }
}