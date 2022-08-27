<?php

namespace App\Services;

class AuthService
{


    public function generatePassword(){
       // bin2hex();
        $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $combLen = strlen($comb) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $comb[$n];
        }
        print(implode($pass));

        $password = implode($pass);
        return $password;
    }
}