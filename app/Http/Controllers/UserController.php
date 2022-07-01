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
        $CLIENT_ID = "963527123473-f4nfg4h0j1ta0m30i9m5h2ps4vl29pvi.apps.googleusercontent.com";
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

    public function destroy($externid)
    {
        $user = User::where('externid', '=', $externid)->get();
        $user->delete();
        return response()->json($user);
    }
}