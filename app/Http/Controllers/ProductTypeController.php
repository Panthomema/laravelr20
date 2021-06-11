<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Auth\Access\AuthorizationException;

class ProductTypeController extends Controller
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
        $producttypes = ProductType::all();
        // dd($producttypes);
        // return $producttypes;
        return view('producttype.index', ['producttypes' => $producttypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación
        $rules = [
            'name' => 'required|string|unique:product_types|max:50'
        ];

        $this->validate($request, $rules);

        // método 1 (más rudimentario)
        $producttype = new ProductType;
        $producttype->name = $request->name; // (para un solo campo)
        // $producttype->fill($request->all()); (para muchos campos)
        $producttype->save();

        // método 2 más rápido. Requiere $fillable en el modelo
        // $producttype = ProductType::create($request->all());

        return redirect('/producttypes');

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
        $producttype = Producttype::find($id);
        return view('producttype.show', ['producttype' => $producttype]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = Producttype::find($id);
        return view('producttype.edit', ['producttype' => $producttype]);
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
        // return "actualizar $id";

        // buscar
        $producttype = ProductType::find($id);

        // Validación
        $rules = [
            'name' => 'required|string|max:50|unique:product_types,name,' . $id
        ];

        $this->validate($request, $rules);

        // modificar
        $producttype->name = $request->name;
        // grabar en bbdd
        $producttype->save();
        // redirigir
        return redirect('/producttypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $request->all();

        $producttype = ProductType::find($id);
        $producttype->delete(); //método 1

        // ProductType::destroy([$id]); //método 2

        // return redirect('/producttypes'); //seleccionamos la ruta que queremos

        return back(); // nos devuelve a la dirección anterior
    }
}
