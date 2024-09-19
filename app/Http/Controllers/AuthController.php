<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showFormRegister(){
        return view('auth/register');
    }

    public function register(Request $request){
        try{
            //Validação
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        //Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/');

        }catch(\illuminate\Validation\ValidationException $e){
            return back()->withErrors($e->errors())->withInput();
        }
    }
}
