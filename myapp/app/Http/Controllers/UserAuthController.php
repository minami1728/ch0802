<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Shop\Entity\User;
use Hash;
use Mail;

class UserAuthController extends Controller
{
    public function Login()
    {
        return view( 'auth.login');
    }

    public function LoginProcess()
    {
        $form_data = request()->all();
        dd($form_data);
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


public function Sign_UpProcess(){
    $form_data = request()->all();
         // dd($form_data );
         // $form_data['password'] = Hash::make($form_data['password']);
         // $user = User::create($form_data);
         if ( $form_data['password'] == "" || $form_data['email'] == "" || $form_data['nickname'] == "" ) {
            return redirect('/user/auth/sign_up')
            ->withInput()
            ->withErrors(['資料不齊全','請檢查所有欄位都填滿']);
        }else{
            $user = User::create([
                'email' => $form_data['email'],
                'password' => Hash::make($form_data['password']),
                'type' => $form_data['type'],
                'nickname' => $form_data['nickname'],
            ]);

            Mail::send('email.signUpEmailNotification', [
                'nickname' => $form_data['nickname']
            ], function($message) use ($form_data) {
                $message->to($form_data['email'], $form_data['nickname'])
                ->from('ck6u35p@gmail.com')
                ->subject('Laravel 8 Mail Test');
            });
    
            dd($user);
        }
}

}