<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserAuthController extends Controller
{
    public function Login()
    {
        return '123歡迎光臨';
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
    $binding = [
        'title' => '註冊',
    ];
    return view( 'auth.happy' , $binding);

}

}