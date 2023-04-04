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

    public function IsUserLogined(){
        return $this->isUserLogined;
    }

    public function GetNickname(){
        return $this->nickname;
    }
    
    public function SetLoginFlag($flag){
        $this->isUserLogined = $flag;
    }
    
    public function GetUserID(){
        return $this->userID;
    }
}
?>