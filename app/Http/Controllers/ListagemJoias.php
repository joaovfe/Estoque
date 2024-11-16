<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListagemJoias extends Controller
{
    public function listarJoias(){
        $posts = [];
    
        $result = DB::table('estoque.item')
            ->select('*')
            ->get();
    
        foreach($result as $config){
            $posts[] = [
                'id_item' => $config->id_item,
                'nome' => $config->nome,
                'descricao' => $config->descricao,
                'preco' => $config->preco,
                'material' => $config->material,
                'data_criacao' => $config->data_criacao,
                'id_categoria' => $config->id_categoria,
            ];
        }
        // dd($posts);
        return view('welcome/welcome', [
            'listagem_joias' => $posts
        ]);
    }
}