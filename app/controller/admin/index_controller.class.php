<?php
namespace Admin;

class IndexController extends ApplicationController{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this -> render();
    }

    public function login(){
        global $params;
        if(array_key_exists("user_name", $params) && array_key_exists("password", $params)){
            \header('Location:/smart_home/admin');
            return ;
        }
        $this -> render();
    }

    public function __initlize(){
        $this -> auth_user_status();
    }
}