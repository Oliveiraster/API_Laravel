<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;


class NavController extends Controller{

    public function home(Request $request){

        $isLoggedIn = false;
        if ($user = JWTAuth::parseToken()->authenticate()) {
            $isLoggedIn = true;
        }

        return view('home/home', ['token' => $isLoggedIn]);

    }
    public function login(){

        return view('user/login');

    }

    public function logar(Request $req){

       $response = UserController::loginApi($req); // simulando uma request à api

       if ($response instanceof \Illuminate\Http\JsonResponse) {
        $data = $response->getData(true);

            if (isset($data['success']) && $data['success'] == true) {
                $token = $data['token'];
                $req->session()->put('token', $token);
                return redirect()->route('home');
            }}
       return view('user/create');
    }

    public function cadastro(){

        return view('user/create');

    }

    public function create(Request $req){
        
    }
}
