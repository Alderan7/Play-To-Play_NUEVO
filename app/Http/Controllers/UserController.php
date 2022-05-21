<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('user', ['user' => Auth::user()]);
    }


    /**
     * @param Request $request
     * @return
     */
    public function update(Request $request)
    {
        if($request->hasFile('avatar')) {
                
            //get filename with extension
            $filenamewithextension = $request->file('avatar')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('avatar')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;

            //Upload File to external server
            Storage::disk('ftp')->put($filenametostore, fopen($request->file('avatar'), 'r+'));

            //Store $filenametostore in the database
            // Get current user
            $userId = Auth::id();
            $user = User::findOrFail($userId);

            // Fill user model
            $user->fill([
                'name' => $request->name,
                'avatar' =>$filenametostore
            ]);

            // Save user to database
            $user->save();

            // Redirect to route
            toastr()->success('Usuario Actualizado Correctamente');
            return redirect()->route('home');
        }else{
            // Get current user
            $userId = Auth::id();
            $user = User::findOrFail($userId);

            // Fill user model
            $user->fill([
                'name' => $request->name,
            ]);

            // Save user to database
            $user->save();

            // Redirect to route
            toastr()->success('Usuario Actualizado Correctamente');
            return redirect()->route('home');
        }
    }
}