<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login');

    }

    public function logIn(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ]);
        };
        if(auth()->user()->role_id == 1){
            return redirect('/productos');
        }
        if(auth()->user()->role_id == 2){
            return redirect('/panel-administrativo');
        }
    }
    public function logout(Request $request){
        Auth::user()->tokens()->delete();
        return view('login');
    }
}
