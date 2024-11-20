<?php

namespace App\Http\Controllers;

use App\Models\Joia;
use Illuminate\Http\Request;

class DeleteJoia extends Controller
{
    public function deleteJoia(Request $request){
        $id_item = $request->id_item;


        $joia = Joia::findOrFail($id_item);
        $joia->delete();

        return redirect()->route('home')->with('success', 'Joia excluída com sucesso!');
    }
}
