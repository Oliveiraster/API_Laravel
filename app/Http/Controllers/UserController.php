<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
class UserController extends Controller{



    public function getAll() {
        $data = UserModel::getUsers();
        return response()->json([
            "data" => $data
        ]);
    }

    public static function create(Request $req) {

        $req->validate([
            "nome" => "required|min:3",
            "senha" => "required|min:8|confirmed",
            "email"=> "required|email|unique:users",
            "altura"=> "required",
            "peso" => "required",
            "idade"=> "required"
        ]);

        if (UserModel::cadastrar($req)) {
            return response()->json([
                'success' => true,
                'message' => 'Usuario cadastrado com sucesso.'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Falha ao cadastrar usuário.'
            ], 400);
        }
    }

    public function login(Request $req){
        $req->validate([
            "email" => "required|email",
            "senha" => "required"
        ]);

        if(UserModel::login($req)){
            return response()->json([
                'success' => true,
                'message' => 'Login bem-sucedido.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Nome ou senha incorretos.'
        ], 401);
    }

    public static function loginApi(Request $req){
        $req->validate([
            "email" => "required|email",
            "senha" => "required"
        ]);

        if($user = UserModel::login($req)){

            $token = JWTAuth::fromUser($user);

            return response()->json([
                'success' => true,
                'message' => 'Login bem-sucedido.',
                'token' => $token
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Nome ou senha incorretos.'
        ], 401);
   }

   public function me(Request $req) {
        // Verifica se o token está presente e é válido
        try {
            $user = JWTAuth::parseToken()->authenticate();
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Token inválido ou expirado.'
            ], 401);
        }
    }


}
