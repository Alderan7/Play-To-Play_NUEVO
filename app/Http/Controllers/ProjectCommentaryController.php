<?php

namespace App\Http\Controllers;

use App\Models\ProjectCommentary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectCommentaryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $comentario = new ProjectCommentary($request->input());
        $comentario->saveOrFail();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $commentary = ProjectCommentary::find($id);
        
        $commentary->delete();
        return redirect()->back();
    }
}
