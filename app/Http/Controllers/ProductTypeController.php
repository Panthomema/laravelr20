<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Auth\Access\AuthorizationException;

class ProductTypeController extends Controller
{
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
<<<<<<< HEAD
        // echo "en create";

=======
>>>>>>> 294c1e3fc9e812f98d7a71faa99f6f1a4fcb6dba
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
<<<<<<< HEAD
        // return "en store";

        // método 1 (más rudimentario)
        $producttype = new ProductType;
        $producttype->name = $request->name; // (para un solo campo)
        // $producttype->fill($request->all()); (para muchos campos)
        $producttype->save();

        // método 2 más rápido. Requiere $fillable en el modelo
        // $producttype = ProductType::create($request->all());

        return redirect('/producttypes');

=======
        //metodo 1 más rudimentario:
        $producttype = new ProductType;
        $producttype->name = $request->name;
        // $producttype->fill($request->all());
        $producttype->save();

        // //metodo 2 más rápido. Requiere $fillable en el modelo
        // $producttype = ProductType::create($request->all());

        return redirect('/producttypes');
>>>>>>> 294c1e3fc9e812f98d7a71faa99f6f1a4fcb6dba
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
<<<<<<< HEAD
        $producttype = Producttype::find($id);
=======
        $producttype = ProductType::find($id);
>>>>>>> 294c1e3fc9e812f98d7a71faa99f6f1a4fcb6dba
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
<<<<<<< HEAD
        $producttype = Producttype::find($id);
=======
        $producttype = ProductType::find($id);
>>>>>>> 294c1e3fc9e812f98d7a71faa99f6f1a4fcb6dba
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

<<<<<<< HEAD
        // buscar
        $producttype = ProductType::find($id);
        // modificar
        $producttype->name = $request->name;
        // grabar en bbdd
        $producttype->save();
        // redirigir
=======
        //buscar
        $producttype = ProductType::find($id);
        //modificar
        $producttype->name = $request->name;
        //grabar en bbdd
        $producttype->save();
        //redirigir
>>>>>>> 294c1e3fc9e812f98d7a71faa99f6f1a4fcb6dba
        return redirect('/producttypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
<<<<<<< HEAD
        // return $request->all();

        $producttype = ProductType::find($id);
        $producttype->delete(); //método 1

        // ProductType::destroy([$id]); //método 2

        // return redirect('/producttypes'); //seleccionamos la ruta que queremos

        return back(); // nos devuelve a la dirección anterior
=======

        // return $request->all();
        $producttype = ProductType::find($id);
        $producttype->delete(); //metodo 1
        // ProductType::destroy([$id]); //metodo 2

        return back();
        // return redirect('/producttypes');
>>>>>>> 294c1e3fc9e812f98d7a71faa99f6f1a4fcb6dba
    }
}
