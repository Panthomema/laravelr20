<?php

namespace App\Http\Controllers;

use App\Models\Fiesta;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FiestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiestas = Fiesta::all();
        return view('fiesta.index', ['fiestas' => $fiestas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('fiesta.create');
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
            'description' => 'required|string|max:50',
            'max_people' => 'integer',
            'date' => 'date|required',
            'private' => 'required',
        ];

        $this->validate($request, $rules);

        $fiesta = new fiesta;

        $fiesta->description = $request->description;
        $fiesta->max_people = $request->max_people;
        $fiesta->date = $request->date;
        $fiesta->price = $request->price;
        $fiesta->private = $request->private;
        $fiesta->user_id = Auth::id();

        $fiesta->save();

        return redirect('/fiestas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fiesta  $fiesta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fiesta = Fiesta::find($id);
        return view('fiesta.show', ['fiesta' => $fiesta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fiesta  $fiesta
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $fiesta = Fiesta::find($id);
        return view('fiesta.edit', ['fiesta' => $fiesta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fiesta  $fiesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'description' => 'required|string|max:50',
            'max_people' => 'integer',
            'date' => 'date|required',
            'private' => 'required',
        ];

        $this->validate($request, $rules);
        
        $fiesta = Fiesta::find($id);

        $fiesta->description = $request->description;
        $fiesta->max_people = $request->max_people;
        $fiesta->date = $request->date;
        $fiesta->price = $request->price;
        $fiesta->private = $request->private;

        $fiesta->save();

        return redirect('/fiestas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fiesta  $fiesta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fiesta::destroy([$id]);

        return back();
    }
}
