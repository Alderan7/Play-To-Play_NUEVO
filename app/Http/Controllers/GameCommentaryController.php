<?php

namespace App\Http\Controllers;

use App\Models\GameCommentary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GameCommentaryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $comentario = new GameCommentary($request->input());
        $comentario->saveOrFail();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $juego
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$GameCommentary->delete();
        //return redirect()->route("games.index")->with(["mensaje" => "Juego eliminado",]);

        $commentary = GameCommentary::find($id);
        
        $commentary->delete();
        return redirect()->back();
    }
}
