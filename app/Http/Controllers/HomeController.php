<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function crear(Request $request) {
        //campos obligatorios
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $notaNueva = new Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada');
    }

    //si encontramos la id en la bd nos retornará la vista
    public function editar($id){
        $nota = Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }

    public function update(Request $request, $id){

        $notaActualizada = Nota::find($id);
        $notaActualizada->nombre = $request->nombre;
        $notaActualizada->descripcion = $request->descripcion;
        $notaActualizada->save();
        //nos retorna el formulario con un mensaje de sesión
        return back()->with('mensaje', 'Nota editada!');

    }

    public function eliminar($id){

        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar->delete();

        return back()->with('mensaje', 'Nota Eliminada');
    }

}
