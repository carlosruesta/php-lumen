<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where([
            'email' => $request->email
        ])->first();

         // usuario existe
        if (is_null($usuario)) {
            return response()->json([
                'error' => true,
                'mensagem' => 'Usuário ou senha inválidos'
            ], 401);
        }

        // validação da senha
        if (!Hash::check($request->password, $usuario->senha)) {
            return response()->json([
                'error' => true,
                'mensagem' => 'Usuário ou senha inválidos'
            ], 401);
        }

        $token = JWT::encode(
            [
                'email' => $usuario->email,
            ],
            env('JWT_KEY')
        );

        return response()->json([
           'error' => false,
           'token' => $token
        ], 200);
    }
}
