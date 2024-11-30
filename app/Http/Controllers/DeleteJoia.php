<?php

namespace App\Http\Controllers;

use App\Models\Joia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteJoia extends Controller
{
    public function deleteJoia(Request $request){
        $id_item = $request->id_item;

        DB::table('moviestoque')->where('id_item', $id_item)->delete();

        $joia = Joia::findOrFail($id_item);
        $joia->delete();

        return redirect()->route('home')->with('success', 'Joia excluída com sucesso!');
    }
}
