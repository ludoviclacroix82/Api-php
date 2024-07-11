<?php

namespace Api\Trait;

use Api\Models\User;

trait  ProtectPage
{
    public function isLogin(){
        $userLogin = isset($_SESSION['username']) ? $_SESSION['username'] : '';

        return (new User('',$userLogin,'', $this->database))->checkUserName();        

    }
}