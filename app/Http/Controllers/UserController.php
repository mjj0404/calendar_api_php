<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "email" => "required",
            "authtype" => "required"
        ]);
        
        $user = new User();
        $user->email = $request->input('email');
        $user->authtype = $request->input('authtype');
        $user->save();

        return response()->json($user);
    }
    
    public function show($userid)
    {
        $user = User::find($userid);
        return response()->json($user);
    }

    public function destroy($userid)
    {
        $user = User::find($userid);
        $user->delete();
        return response()->json($user);
    }
}