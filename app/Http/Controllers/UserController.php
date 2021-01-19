<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function authenticate(UserLoginRequest $request)
    {

        if (\Auth::attempt($request->validated())) {
            session()->regenerate();
            flash('C возвращением, ' . \Auth::user()->name . '!');
            return redirect(route('main'));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Пользователь не найден или введен не верный пароль']);
    }

    public function register()
    {
        return view('user.register');
    }

    public function create(UserRegistrationRequest $request)
    {
        $arr = $request->validated();
        $arr['password'] = \Hash::make($arr['password']);
        $user = User::create($arr);
        \Auth::login($user);
        flash('Добро пожаловать, ' . $user->name . '!');

        return redirect(route('main'));
    }

    public function logout(Request $request)
    {
        \Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        flash('Скорее возвращайтесь!!');

        return redirect(route('main'));
    }

    public function show(User $user)
    {
        return redirect(route('main'));
    }

    public function passwordRequest()
    {
        return view('user.password-forgot');
    }

    public function passwordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset($token)
    {
        return view('user.reset-password', ['token' => $token]);
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => \Hash::make($password)
                ])->save();

                $user->setRememberToken(\Str::random(60));

                event(new PasswordReset($user));
            }
        );
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('user.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
