<?php

namespace App\Http\Controllers;

use App\Models\Role_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Role_UserController extends Controller
{
    public function update(Request $request, Role_User $Role_User)
    {
        $Role_User->fill($request->input())->saveOrFail();
        return redirect()->route("home");
    }

}