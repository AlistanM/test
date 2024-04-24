<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MyUser;

class MyController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
    
        $user = MyUser::Where('login', $login)->get();

        if ($user->value('password') === $password)
        {
            return "Вы авторизованы!";
        }
        else
        {
            return "Неверный логин или пароль!";
        }

    }

    public function register(Request $request)
    {
        $login = $request->input('login');
        $email = $request->input('email');
        $password = $request->input('password');

        MyUser::insert(
            ['login' => $login, 'email' => $email, 'password' => $password],
        );

        return "Вы успешно зарегестрировались!";
    }

    public function recover(Request $request)
    {
        $email = $request->input('email');

        $user = MyUser::Where('email', $email)->get();

        if($user->count() == 0)
        {
            return "Пользователь с такой почтой не найден";
        }
        else
        {
            return "Письмо со сбросом отправлено на вашу почту";
        }
    }
}
