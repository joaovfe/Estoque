<?php

namespace App\Http\Controllers;

use App\Models\Joia;
use Illuminate\Http\Request;

class DetalheItem extends Controller
{
    public function detalheItem($id){
        $joia = Joia::findOrFail($id);

        return view('detalheJoia/detalheJoia', [
            'joia' => $joia
        ]);
    }

    public function salvarJoia(Request $request, $id){
        $joia = Joia::findOrFail($id);

        $joia->nome = $request->nome;
        $joia->preco = str_replace(',', '.', str_replace('.', '', $request->preco));
        $joia->id_status = $request->status;
        $joia->descricao = $request->descricao;

        $joia->save();

        return redirect()->route('detalheJoia', ['id' => $joia->id_item])->with('success', 'Joia atualizada com sucesso!');
    }
}
