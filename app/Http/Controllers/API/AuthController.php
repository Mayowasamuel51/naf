<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function logout()
    {
        auth()->user()->tokens()->delete();
        // Auth::logout();
        return response()->json([
            'status' => 200,
            'message' => 'Logged out okay'
        ]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'validation_erros' => $validator->messages(),
            ]);
        } else {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
            $token_user =  $user->createToken($user->email . '_Token',)->plainTextToken;
            return response()->json([
                'status' => 200,
                'token_name' => $user->name,
                'token' => $token_user,
                'message' => 'Registerd '
            ]);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => 401,
                    'message_back' => 'invaild credentials'
                ]);
            } else {
                if ($user->role ===  1) { // 1 is admin main guy
                    $role = 'admin';
                    $token_user =  $user->createToken($user->email . '_AdminToken', ['server:admin'])->plainTextToken;
                    return response()->json([
                        'status' => 200,
                        'token_name' => $user->name,
                        'token' => $token_user,
                        'message' => 'Login Successfully ',
                        "role" => $role
                    ]);
                } else if ($user->role ===  4) { //ipo 
                    $role = 'ipo';
                    $token_user =  $user->createToken($user->email. '_IpoToken', ['server:ipo'])->plainTextToken;
                    return response()->json([
                        'status' => 200,
                        'token_name' => $user->name,
                        'token' => $token_user,
                        'message' => 'Login Successfully ',
                        "role" => $role
                    ]);
                } else if ($user->role === 5) {
                    $role = 'fd';
                    $token_user =  $user->createToken($user->email.'_FdToken',['server:fd'])->plainTextToken;
                    return response()->json([
                        'status' => 200,
                        'token_name' => $user->name,
                        'token' => $token_user,
                        'message' => 'Login Successfully ',
                        "role" => $role
                    ]);
                } else if ($user->role ===  3) {
                    $role = 'rf';
                    $token_user =  $user->createToken($user->email .'_RfToken', ['server:rf'])->plainTextToken;
                    return response()->json([
                        'status' => 200,
                        'token_name' => $user->name,
                        'token' => $token_user,
                        'message' => 'Login Successfully ',
                        "role" => $role
                    ]);
                } else if($user->role === 0 ) {
                    $role = 'oc';
                    $token_user =  $user->createToken($user->email . '_Token', ['server:oc'])->plainTextToken;
                    return response()->json([
                        'status' => 200,
                        'token_name' => $user->name,
                        'token' => $token_user,
                        'message' => 'Login Successfully ',
                        "role" => $role
                    ]);
                }

                // return response()->json([
                //     'status' => 200,
                //     'token_name' => $user->name,
                //     'token' => $token_user,
                //     'message' => 'Login Successfully ',
                //     "role" => $role
                // ]);
            }
        }
    }
}
