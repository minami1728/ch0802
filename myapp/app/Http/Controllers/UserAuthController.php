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


}