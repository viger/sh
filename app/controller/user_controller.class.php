<?php
class UserController extends ApplicationController {

    public function index(){
        echo "auto";
        var_dump($_GET);
    }

    public function login(){
        if( array_key_exists("_name", $params) &&  array_key_exists("_passwd", $params) ){
            echo "login";
        }
        else{
            $this -> render(["layout" => "login"]);
        }
    }
}