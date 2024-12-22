<?php
namespace src\util;

class PasswordEncrypt{

    public function passwordEncryption($password){
        return password_hash($password,PASSWORD_DEFAULT);
    }

    public function passworDecryption()
    {
        
    }

}