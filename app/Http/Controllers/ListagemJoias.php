<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListagemJoias extends Controller
{
    public function listarJoias()
    {
        $result = DB::table('estoque_teste.item')
            ->select(
                'item.id_item',
                'item.nome',
                'item.descricao',
                'item.preco',
                'item.material',
                'item.data_criacao',
                'item.id_categoria',
                'categoria.nome as categoria',
                'status.status_nome as status'
            )
            ->join('estoque_teste.categoria', 'item.id_categoria', '=', 'categoria.id_categoria')
            ->join('estoque_teste.status', 'item.id_status', '=', 'status.id_status')
            ->orderby('id_item', 'ASC' )
            ->paginate(10); 

        return view('welcome/welcome', [
            'listagem_joias' => $result
        ]);
    }
}