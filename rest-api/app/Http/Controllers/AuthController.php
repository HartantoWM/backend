<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //membuat fitur  register 
    public function register(Request $request){

        //menangkap inputan 
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        // Menginsert Data Ke Table User
        $user = User::create($input);

        $data = [
            "message" => "User is created successfully"
        ];

        // Mengirim Response JSON
        return response()->json($data, 200);
    }    



// Membuat Fitur Login
    public function login (Request $request) {

    $input = [
        "email" => $request->email,
        "password" => $request->password
    ];


    if (Auth::attempt($input)) {
        $token = Auth::user()->createToken('auth_token');

        $data = [
            "message" => "Login successful",
            "token"=> $token->plainTextToken
        ];

        return response()->json($data,200);
    } else {
        $data = [ 
            "message" => "Username or Password is wrong"
        ];

        return response()->json($data,401);
    }
}

}