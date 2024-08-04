<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserAuthController extends Controller
{
    public function Login()
    {
        return view( 'auth.login');
    }

    public function Profile($id)
    {
        return 'my id :' . $id;
    }


public function SignUp()
{
    $binding = [
        'title' => '註冊',
        'sub_title' => '歡迎光臨',
    ];
    return view( 'auth.signup' , $binding);

}

public function Happy()
{
    return view( 'auth.happy');

}

public function Cat()
{
    $binding = [
        'title' => '註冊',
    ];
    return view( 'auth.cat' , $binding);

}

public function Sign_Up()
{
    $binding = [
        'title' => '註冊',
    ];
    return view( 'auth.sign_up' , $binding);

}

}