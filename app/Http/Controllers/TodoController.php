<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function show(){
        $todo = DB::table('todolist')->get();
        return view('show', ['todoList' =>$todo]);
    }

    public function add(Request $request){
        $validated=$request->validate([
            'nom'=>'string',
        ]);
        $todo = new Todo();
        $todo->nom=$validated['nom'];
        $todo->created_at= Carbon::now();
        $todo->save();
        $request->session()->flash('etat', 'l\'ajout de votre note a été effectué avec succès');
        return redirect()->back();
    }

    public function delete(Request $request, $id){
        $supprimer=Todo::find($id);
        $supprimer->delete($id);
        $request->session()->flash('etat', 'la suppression de la note réussie');
        return redirect()->back();
    }

    public function modForm($id){
        $modifier= Todo::find($id);
        return view('edit', ['nom'=> $modifier]);
    }

    public function modifier(Request $request, $id){
        $validated=$request->validate([
            'nom'=>'string',
        ]);
        $todo = Todo::find($id);
        $todo->nom=$validated['nom'];
        $todo->updated_at= Carbon::now();
        $todo->save();
        $request->session()->flash('etat', 'la modification a été effectuée avec succès');
        return redirect()->route('index',['todo' => $todo]);
    }
}
