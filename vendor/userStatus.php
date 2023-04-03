<?php
class User{
    private $nickname = null;
    private $email = null;

    private $isUserLogined;

    public function __construct()
    {
        $this->isUserLogined = false;
    }

    public function SetUserData($userData)
    {
        $this->nickname = $userData['nickname'];
        $this->email = $userData['email'];
    }

    public function IsUserLogined(){
        return $this->isUserLogined;
    }

    public function GetNickname(){
        return $this->nickname;
    }
    
    public function SetLoginFlag($flag){
        $this->isUserLogined = $flag;
    }
}
?>