<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable;



class UserModel extends Model implements JWTSubject
{
    protected $connection = 'pgsql';
    protected $table = 'users';

    public static function getUsers (){
        return self::select([
            "id",
            "nome",
            "altura",
            "peso",
            "idade",
        ])->get();
    }
    public static function cadastrar(Request $req){
        DB::enableQueryLog();
        self::insert([
            "nome" => $req->input('nome'),
            "email" => $req->input('email'),
            "senha" => Hash::make($req->input('senha')),
            "altura" => $req->input('altura'),
            "peso" => $req->input('peso'),
            "idade" => $req->input('idade'),
        ]);
        DB::getQueryLog();
        return true;
    }

    public static function login(Request $req){
       $user = self::where("email", $req->input('email'))->first();


        if ($user && Hash::check($req->input('senha'), $user->senha)) {
            return $user;
        }

        return false;
    }


    //JWT

    public function getJWTIdentifier() {
        return $this->getKey();  // Retorna a chave primária do usuário (id)
    }

    public function getJWTCustomClaims() {
        return [];  // Retorna um array de dados adicionais para o JWT, se necessário
    }

    public function getAuthIdentifierName(){
        return 'id'; // Ou o nome da coluna que você usa como identificador do usuário
    }
}
