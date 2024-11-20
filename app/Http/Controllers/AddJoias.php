<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddJoias extends Controller
{
    public function addJoias(){

        $categories = DB::table('estoque.categoria')
        ->get();

        $status = DB::table('estoque.status')
        ->get();

        return view('AddJoias/addJoias', [
            'teste' => 'teste',
            'categorias' => $categories,
            'status' => $status
        ]);
    }


    public function salvarJoias(Request $request){
        DB::table('estoque.item')->insert([
            'material' => $request->input('material'),
            'descricao' => $request->input('descricao'),
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'id_categoria' => $request->input('id_categoria'), 
            'id_status' => $request->input('id_status'),       
            'data_criacao' => now(),  
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Joia adicionada com sucesso!'
        ]);
    }
}
