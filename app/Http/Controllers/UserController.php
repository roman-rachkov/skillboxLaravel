<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;

class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function authenticate(UserLoginRequest $request){

       if(\Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return redirect()->intended('main');
       }

       return back()
           ->withInput($request->only('email'))
           ->withErrors(['email' => 'Пользователь не найден или введен не верный пароль']);
    }
}
