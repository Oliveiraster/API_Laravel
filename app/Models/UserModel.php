<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserModel extends Model
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
    public static function cadastrar(Request $request){
        DB::enableQueryLog();
        self::insert([
            "nome" => $request->input('nome'),
            "altura" => $request->input('altura'),
            "peso" => $request->input('peso'),
            "idade" => $request->input('idade'),
        ]);
        DB::getQueryLog();
        return true;
    }
}
