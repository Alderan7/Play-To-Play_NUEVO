<?php

namespace App\Http\Controllers;

use App\Models\Role_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Role_UserController extends Controller
{
    public function update(Request $request, Role_User $Role_User, $id)
    {
        $roleUser = Role_User::find($id);        
        $roleUser->delete();
        $Role_User->fill($request->input())->saveOrFail();
        return view("paypal_pay");
    }    
}
