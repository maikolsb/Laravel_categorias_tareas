<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\category;

class TareasController extends Controller
{
    /**
     * Index Para mostrar todos los elementos
     * store para guardar tarea
     * update para actualizar tarea
     * destroy para eliminar tarea
     * edit para mostrar formulario de edicion
     */
    
     public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $tarea = new Tarea;
        $tarea->title = $request->title;
        $tarea->category_id = $request->category_id;
        $tarea->save();

        return redirect()->route('tareas')->with('success', 'Tarea Creada Correctamente');
     }

     public function index(){
        $tareas  = Tarea::all();
        $categories = Category::all();
        return view('tareas.index', ['tareas' => $tareas, 'categories' => $categories]);
     }

     public function show($id){
        $tarea  = Tarea::find($id);
        return view('tareas.show', ['tarea' => $tarea]);
     }

     public function update(Request $request, $id){
        $tarea  = Tarea::find($id);
        $tarea->title = $request->title;
        $tarea->save();
        //dd($request); # Con esto puedo depurar mas rapidamente.

        return redirect()->route('tareas')->with('success', 'Tarea Actualizada Correctamente');
     }

     public function destroy($id){
        $tarea = Tarea::find($id);
        $tarea->delete();

        return redirect()->route('tareas')->with('success', 'Tarea Eliminada Correctamente');

     }
}
