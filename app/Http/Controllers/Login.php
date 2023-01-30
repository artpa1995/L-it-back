<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestValidations;

class Login extends Controller
{
    //
    private $login;
    private $password;
    public function login (RequestValidations $posts){
        // $valid = $posts->validate([
        //     'login' => 'required',
        //     'password' => 'required',
        // ]);

        $this->login = $posts->input('login');
        $this->password = $posts->input('password');
         dd($this->login,$this->password);
        // echo "<pre>";
        // print_r($valid);
        // die;
    }
}
