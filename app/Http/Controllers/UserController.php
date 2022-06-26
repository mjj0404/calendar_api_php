<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Google_Client;

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
            "externid" => "required"
        ]);
        
        $user = new User();
        $user->email = $request->input('email');
        $user->externid = $request->input('externid');
        $user->save();

        return response()->json($user);
    }
    
    public function show($userid)
    {
        $user = User::find($userid);
        return response()->json($user);
    }

    public function verify(Request $request)
    {
        require_once(__DIR__ . '/../../../vendor/autoload.php');

        $id_token = $_POST['tokenid'];
        $CLIENT_ID = "465830011734-j12vai4f5ee41h5v9e1sh5rp5d12csqu.apps.googleusercontent.com";
        $client = new Google_Client(['client_id' => $CLIENT_ID]);
        $payload = $client->verifyIdToken($id_token);
        if ($payload) {
            $userid = $payload['sub'];
            return response()->json($userid);
        } else {
            return response()->json($payload);
        }
        return response()->json($id_token);
    }

    public function destroy($userid)
    {
        $user = User::find($userid);
        $user->delete();
        return response()->json($user);
    }
}