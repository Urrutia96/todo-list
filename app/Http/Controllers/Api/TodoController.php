<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;

class TodoController extends Controller
{
    
    /**
     * Mostrar toda la lista de TODO's
     * 
     * @param Request $request
     * @return json
     */
    public function todos(Request $request){
        return Todo::paginate(50)->toArray();
    }

    /**
     * Guardar uno nuevo TODO
     * 
     * @param Request $request
     * @return json
     */
    public function store(Request $request){
        $todo = new Todo();
        $todo->todo = $request->todo;
        $todo->ready = false;
        if($todo->save()){
            return response()->json(['mensaje'=>null,'todo'=>$todo->toArray()]);
        }
        //En caso de que no se guarde
        return response()->json(['mensaje'=>'ha ocurrido un error', 'status'=>'error','todo'=>null]);
    }

    /**
     * Marcar como hecho
     * 
     * @param Request $request
     * @return json
     */
    public function ready(Request $request){
        $todo = Todo::findOrFail($request->id);
        if($todo){
            $todo->ready = true;
            $todo->save();
            return response()->json(['mensaje'=>null,'todo'=>$todo->toArray()]);
        }
        // En caso que no se encuentre el TODO
        return response()->json(['mensaje'=>'ha ocurrido un error', 'status'=>'error','todo'=>null]);
    }
    
    // END
}
