<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidades;
class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $esp= Especialidades::all(); // pedimos a modelo  q traiga toda la tabla especil
    
        return view('layouts.admin.profesionales.profesionales',compact ('esp')); // esp: variable a pasar a vista profesionales.index con info de tabla
    
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     // nueva esp
    public function store(Request $request)
    {
        $esp= new Especialidades();
        
          $esp->esp_nombre= $request->get('nombre');
           
          $esp->save();
          return redirect()->route('vistaEsp')->with('exitoo','here your success message');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $especialidad= Especialidades::find($id);
        if($especialidad->delete()){
        
      
        return redirect()->route('vistaEsp')->with('success','here your success message');
    }else{
      return redirect()->route('vistaEsp')->with('warning','here your success message');
   
   
    }

}

    public function vistaEspecialidades()
    {  $esp= Especialidades::all(); // pedimos a modelo  q traiga toda la tabla especil
        return view('layouts.admin.especialidades.especialidades',compact ('esp'));
    }
}
