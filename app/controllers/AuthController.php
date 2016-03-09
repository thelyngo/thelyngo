<?php

class AuthController extends Controller
{
    public function logoutAction()
    {
        if (Auth::user())
            Auth::logout();

        Tools::redirect();
    }
}
