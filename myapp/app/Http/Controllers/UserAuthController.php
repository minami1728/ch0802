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
        //dd($form_data);
        $user = User::where('email', $form_data['email'])->FirstOrFail();
        if (Hash::check($form_data['password'], $user->password)){
            echo '登入成功';
            session()->put('user_id', $user->id);
            session()->put('user_email', $user->email);
            # 導向到首頁
            return redirect('/user/auth/page');
        }else{
            echo '登入失敗';
             # 導向到登入頁
             return redirect('/user/auth/login')
             ->withInput()
             ->withErrors(['無此帳號','帳號密碼錯誤']);
        }
    }

    public function SignOut()
    {
        session()->forget('user_id');
        return redirect('/user/auth/login');
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
             # 判斷帳號是否重複
             $user = User::where('email', $form_data['email'])->first();
             if (!is_null($user)) {
                 return redirect('/user/auth/sign_up')
                 ->withInput()
                 ->withErrors(['此帳號已被註冊','請更換帳號']);
             }

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
    
            return redirect('/user/auth/login');
        }
}

public function Page()
{
    return view( 'auth.page');

}

}