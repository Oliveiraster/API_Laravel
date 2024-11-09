<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller{



    public function getAll() {
        $data = UserModel::getUsers();
        return response()->json([
            "data" => $data
        ]);
    }

    public function create(Request $req) {

        $req->validate([
            "nome" => "required|min:3",
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
}
