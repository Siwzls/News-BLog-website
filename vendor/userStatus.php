<?php
class User{
    public $isUserLogined;
    
    private $userID = null;
    private $nickname = null;
    private $email = null;

    public function __construct()
    {
        $this->isUserLogined = false;
    }

    public function SetUserData($userData)
    {
        $this->userID = $userData['id'];
        $this->nickname = $userData['nickname'];
        $this->email = $userData['email'];
    }

    public function GetNickname(){
        return $this->nickname;
    }
    
    public function GetUserID(){
        return $this->userID;
    }
}
?>