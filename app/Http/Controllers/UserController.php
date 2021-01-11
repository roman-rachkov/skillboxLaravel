<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function authenticate(UserLoginRequest $request){

       if(\Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return redirect(route('main'));
       }

       return back()
           ->withInput($request->only('email'))
           ->withErrors(['email' => 'Пользователь не найден или введен не верный пароль']);
    }

    public function register(){
        return view('user.register');
    }

    public function create(UserRegistrationRequest $request){
        $arr = $request->validated();
        $arr['password'] = \Hash::make($arr['password']);
        $user = User::create($arr);
        \Auth::login($user);
        return redirect(route('main'));
    }

    public function logout(Request $request){
        \Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('main'));
    }
}
