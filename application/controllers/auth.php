<?php

class Auth_Controller extends Base_Controller 
{
    public function action_index()
    {
        return Redirect::home();
    }

    public function action_login()
    {
        $username = Input::get('email');
        $password = Input::get('password');

        $credentials = array(
            'username' => Input::get('email'),
            'password' => Input::get('password'),
        );

        if (Auth::attempt($credentials, $remember = false)) {
            $data = User::where('username', '=', $username)->first();
            Auth::login($data, $remember = false);
        }

        return Redirect::back()->with('flash_notice', 'You are now logged in');
    }

    public function action_logout()
    {
        Auth::logout();
        return Redirect::back()->with('flash_notice', 'You are now logged out');
    }
}
