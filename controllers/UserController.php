<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    
    private $userModel;

    public function __construct() {
        $this->userModel=new User();
    }
    
    public function check(){
         $ecommerceData=$this->userModel->getEcommerceData();
         include __DIR__ . '/../views/user-success.php';
    }

    // Método para el form principal
    public function login() {
        $ecommerceData=$this->userModel->getEcommerceData();
        include __DIR__ . '/../views/user-login.php';
    }
}