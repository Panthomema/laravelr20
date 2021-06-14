<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Session;
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
        $this->authorize('viewAny', Product::class);
        $products = Product::all();
        //$products = Product::with('producttype')->get();****
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
            'name' => 'required|string|max:50|unique:products,name',
            'price' => 'required|numeric',
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

        $this->authorize('view', $product);
        // Último producto visitado (metido en sesión)
        session(['lastProduct' => $product]);
        //Session::put('lastProduct', $product);

        // Lista de productos visitados: 'history'.............................................
        if (Session::has('history')) {
            $history = Session::get('history');
        } else {
            $history = array();
        }
        
        $history[] = $product;
        Session::put('history', $history);
        
        // Lista de productos con contador: 'countedHistory'..........................................
        $this->addToHistory($product);

        return view('product.show', ['product' => $product]);
        //return "Ver producto: " . $product->name; //automaticamente json, status 200
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
    public function destroy($id)
    {
        Product::destroy([$id]);

        return back();
    }


    public function forgetLastProduct()
    {
        // Session::flush();
        Session::forget('lastProduct');
        return back();
    }

    public function addToHistory($product)
    {
        if (Session::has('countedHistory')) {
            $countedHistory = Session::get('countedHistory');
        } else {
            $countedHistory = array();
        }
        
        if (isset($countedHistory[$product->id])) {
            $countedHistory[$product->id]->counter++;
        } else {
            $product->counter = 1;
            $countedHistory[$product->id] = $product;
        }

        // $product->counter = 1;
        // $product->counter++;
        // $countedHistory[] = $product;
        Session::put('countedHistory', $countedHistory);
    }

    public function down($id)
    {   
        if (Session::has('countedHistory')) {
            $countedHistory = Session::get('countedHistory');
        } else {
            $countedHistory = array();
        }

        if (isset($countedHistory[$id])) {
            if ($countedHistory[$id]->counter > 1) {
                $countedHistory[$id]->counter--;
            } else {
                unset($countedHistory[$id]);
            }
        }

        Session::put('countedHistory', $countedHistory);
        return back();
    }

    public function up($id)
    {  
        if (Session::has('countedHistory')) {
            $countedHistory = Session::get('countedHistory');
        } else {
            $countedHistory = array();
        }
        
        if (isset($countedHistory[$id])) {
            $countedHistory[$id]->counter++;
        }

        Session::put('countedHistory', $countedHistory);
        return back();
    }

    public function remove($id)
    {
        if (Session::has('countedHistory')) {
            $countedHistory = Session::get('countedHIstory');
        } else {
            $countedHistory = array();
        }

        unset($countedHistory[$id]);

        Session::put('countedHistory', $countedHistory);
        return back();
    }

}
