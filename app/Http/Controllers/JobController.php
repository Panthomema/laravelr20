<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\User;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Creamos array con todos
        $jobs = Job::all();
        //Llamamos a la vista, le pasamos el array con las variables que queremos meter
        return view('job.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //Obtenemos un array con los usuarios
        $users = User::all();
        //Devolvemos la vista, pasamos el array
        return view('job.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Definimos reglas
        $rules = [
            'date' => 'required|date',
        ];
        //Validamos
        $this->validate($request, $rules);

        //Creamos un nuevo objeto tipo job (para insertar)
        $job = new job;

        //Usamos fill para insertar los campos que recogemos del formulario
        $job->fill($request->all()); 
        //Guardamos
        $job->save();

        //Volvemos al index
        return redirect('/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscamos mediante el id
        $job = Job::find($id);
        //Devolvemos la vista y le pasamos variables
        return view('job.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recogemos todos los usuarios y el trabajo a editar
        $users = User::all();
        $job = Job::find($id);
        //Devolvemos la vista
        return view('job.edit', ['job' => $job, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Definimos reglas
        $rules = [
            'date' => 'required|date',
        ];
        //Validamos
        $this->validate($request, $rules);
        
        //Buscamos el trabajo a modificar
        $job = Job::find($id);

        //Pasamos los datos del formulario al trabajo en cuestión
        $job->date = $request->date;
        $job->user_id = $request->user_id;

        //Insertamos
        $job->save();

        //Volvemos al index

        return redirect('/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //Usamos método destroy
        Job::destroy([$id]);

        //Volvemos a la dirección anterior
        return back();
    }
}
